<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 18:44
 */

namespace Myproject\Tests\Challenges;

use Myproject\Challenges\Drunkard;
use \PHPUnit\Framework\TestCase;

class DrunkardTest extends TestCase
{
    public function testRun()
    {
        $game = new Drunkard();
        $result = $game->run([1], [2]);
        $this->assertEquals('Second player. Round: 1', $result);

        $result = $game->run([2], [1]);
        $this->assertEquals('First player. Round: 1', $result);

        $result = $game->run([1], [1]);
        $this->assertEquals('Botva!', $result);

        $result = $game->run([1, 2], [3, 2]);
        $this->assertEquals('Second player. Round: 2', $result);

        $result = $game->run([1, 3], [2, 1]);
        $this->assertEquals('First player. Round: 4', $result);
    }
}
