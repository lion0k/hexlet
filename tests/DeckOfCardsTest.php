<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 12:05
 */

namespace Myproject\Tests;

use \PHPUnit\Framework\TestCase;
use Myproject\DeckOfCards;

class DeckOfCardsTest extends TestCase
{
    public function testGetShuffled1()
    {
        $expected = [2, 2, 2, 2, 3, 3, 3, 3];
        $deck = new DeckOfCards([2, 3]);
        $result1 = $deck->getShuffled();
        $result2 = $deck->getShuffled();
        $this->assertNotEquals($result1, $result2);

        sort($result1);
        $this->assertEquals($expected, $result1);

        sort($result2);
        $this->assertEquals($expected, $result2);
    }

    public function testGetShuffled2()
    {
        $expected = [7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9];
        $deck = new DeckOfCards([8, 9, 7]);
        $result1 = $deck->getShuffled();
        $result2 = $deck->getShuffled();
        $this->assertNotEquals($result1, $result2);

        sort($result1);
        $this->assertEquals($expected, $result1);

        sort($result2);
        $this->assertEquals($expected, $result2);
    }
}
