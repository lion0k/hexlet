<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 26.09.18
 * Time: 14:16
 */

namespace Myproject\Tests\Challenges;

use Myproject\Challenges\Enumerable;
use \PHPUnit\Framework\TestCase;

class EnumerableTest extends TestCase
{
    public function testWhere()
    {
        $coll = Enumerable::wrap([]);
        $this->assertEquals([], $coll->all());

        $elements = [
            ['key' => 'value'],
            ['key' => '']
        ];
        $coll = Enumerable::wrap($elements);
        $result = $coll->where('key', 'value');
        $expected = [
            ['key' => 'value']
        ];
        $this->assertEquals($expected, $result->all());
        $this->assertEquals($elements, $coll->all());
    }
}
