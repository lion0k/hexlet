<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 10:36
 */

namespace Myproject;

use Tightenco\Collect;

class DeckOfCards
{
    private $partDeck;

    public function __construct($partDeck)
    {
        $this->partDeck = $partDeck;
    }

    public function getShuffled():array
    {
        $collection = collect($this->partDeck);
        $arr = collect();
        $collection->map(function ($val, $key) use ($arr) {
            for ($i = 0; $i < 4; $i++) {
                $arr->push($val);
            }
            return $arr;
        }, []);
        return $arr->shuffle()->toArray();
    }
}
