<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 15:44
 */

namespace Myproject\Tests;

use Myproject\Normalizer;
use \PHPUnit\Framework\TestCase;

class NormalizerTest extends TestCase
{
    public function testNormalize()
    {
        $raw = [
            [
                'name' => 'istambul',
                'country' => 'turkey'
            ],
            [
                'name' => 'Moscow ',
                'country' => ' Russia'
            ],
            [
                'name' => 'iStambul',
                'country' => 'tUrkey'
            ],
            [
                'name' => 'antalia',
                'country' => 'turkeY '
            ],
            [
                'name' => 'samarA',
                'country' => '  ruSsiA'
            ],
        ];
        $norm = new Normalizer($raw);
        $actual = $norm->getNormalView();
        $expected = [
            'russia' => [
                'moscow', 'samara'
            ],
            'turkey' => [
                'antalia', 'istambul'
            ]
        ];
        $this->assertEquals($expected, $actual);
    }

    public function testNormalize2()
    {
        $raw = [
            [
                'name' => 'pariS ',
                'country' => ' france'
            ],
            [
                'name' => ' madrid',
                'country' => ' sPain'
            ],
            [
                'name' => 'valencia',
                'country' => 'spain'
            ],
            [
                'name' => 'marcel',
                'country' => 'france'
            ],
            [
                'name' => ' madrid',
                'country' => ' sPain'
            ],
        ];
        $norm = new Normalizer($raw);
        $actual = $norm->getNormalView();
        $expected = [
            'france' => [
                'marcel', 'paris'
            ],
            'spain' => [
                'madrid', 'valencia'
            ]
        ];
        $this->assertEquals($expected, $actual);
    }
}
