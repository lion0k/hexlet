<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 14:24
 */

namespace Myproject\Challenges;

use Carbon\CarbonPeriod;
use Tightenco\Collect;

class MyDates
{
    public function buildRange(array $data, $perStr, $perEnd)
    {
        $period = CarbonPeriod::create($perStr, $perEnd);
        $key = \collect($data)->keyBy('date')->toArray();
        $res = [];
        foreach ($period as $value) {
            $formatDate = $value->format('d.m.Y');
            if (array_key_exists($formatDate, $key)) {
                $res[] = ['value' => $key[$formatDate]['value'], 'date' => $formatDate];
            } else {
                $res[] = ['value' => 0, 'date' => $formatDate];
            }
        }
        return $res;
    }
}
