<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 13:05
 */

namespace Myproject;

use function Stringy\create as s;

class Questions
{
    public function getQuestions(string $str)
    {
        $text = s($str);
        $arr = $text->lines();
        $res = '';
        foreach ($arr as $val) {
            if ($val->endsWith('?')) {
                if (empty($res)) {
                    $res = $val;
                } else {
                    $res .= "\n";
                    $res .= $val;
                }
            }
        }
        return $res;
    }
}
