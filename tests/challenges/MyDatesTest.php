<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 14:55
 */

namespace Myproject\Tests\Challenges;

use Myproject\Challenges\MyDates;
use \PHPUnit\Framework\TestCase;

class MyDatesTest extends TestCase
{
    public function testGetRange()
    {
        $dates = [
            [ 'value' => 14, 'date' => '02.08.2018' ],
            [ 'value' => 43, 'date' => '03.08.2018' ],
            [ 'value' => 38, 'date' => '05.08.2018' ],
        ];
        $beginDate = '2018-08-01';
        $endDate = '2018-08-10';
        $expected = [
            [ 'value' => 0, 'date' => '01.08.2018' ],
            [ 'value' => 14, 'date' => '02.08.2018' ],
            [ 'value' => 43, 'date' => '03.08.2018' ],
            [ 'value' => 0, 'date' => '04.08.2018' ],
            [ 'value' => 38, 'date' => '05.08.2018' ],
            [ 'value' => 0, 'date' => '06.08.2018' ],
            [ 'value' => 0, 'date' => '07.08.2018' ],
            [ 'value' => 0, 'date' => '08.08.2018' ],
            [ 'value' => 0, 'date' => '09.08.2018' ],
            [ 'value' => 0, 'date' => '10.08.2018' ],
        ];

        $obj = new MyDates();
        $actual = $obj->buildRange($dates, $beginDate, $endDate);
        $this->assertEquals($expected, $actual);
    }
}
