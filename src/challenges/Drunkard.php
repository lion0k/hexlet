<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 17:04
 */

namespace Myproject\Challenges;

use Ds\Deque;

class Drunkard
{
    public function run(array $player1, array $player2)
    {
        $deck1 = new Deque($player1);
        $deck2 = new Deque($player2);

        for ($i = 0; $i < 100; $i++) {
            if ($deck1->isEmpty() && $deck2->isEmpty()) {
                return 'Botva!';
            } elseif ($deck1->isEmpty()) {
                return "Second player. Round: {$i}";
            } elseif ($deck2->isEmpty()) {
                return "First player. Round: {$i}";
            }

            $kart1 = $deck1->pop();
            $kart2 = $deck2->pop();
            if ($kart1 > $kart2) {
                $deck1->unshift($kart1, $kart2);
            } elseif ($kart1 < $kart2) {
                $deck2->unshift($kart2, $kart1);
            }
        }
        return 'Botva!';
    }
}
