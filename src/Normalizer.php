<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 12:28
 */

namespace Myproject;

class Normalizer
{
    private $arr;
    public function __construct($arr)
    {
        $this->arr = collect($arr);
    }

    public function getNormalView()
    {
        $norm = $this->arr->map(function ($item) {
            $res = [];
            foreach ($item as $key => $val) {
                $res[$key] = strtolower(trim($val));
            }
            return $res;
        })->unique()
              ->sortBy('name')
              ->reduce(function ($acc, $item) {
                  $tempName = '';
                foreach ($item as $key => $val) {
                    if ($key === 'name') {
                        $tempName = $val;
                        continue;
                    }
                    if (array_key_exists($val, $acc)) {
                        $acc[$val][] = $tempName;
                    } else {
                        $acc[$val] = array($tempName);
                    }
                }
                  return $acc;
              }, []);
        uksort($norm, function ($a, $b) {
            return strcasecmp($a, $b);
        });
        return $norm;
    }
}
