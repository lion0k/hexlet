<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 18:59
 */

namespace Myproject\Challenges;

class Enumerable
{
    private $elements;
    static $cache = [];

    public function __construct($value = [])
    {
        $this->elements = $value;
    }

    private function getCache(string $key, string $value)
    {
        $hashData = $this->getHashDataForCache($this->elements);
        $hashKey = $this->getHashKeyValueForCache($key, $value);

        if (!empty(self::$cache) && array_key_exists($hashData, self::$cache)) {
            if (array_key_exists($hashKey, self::$cache[$hashData])) {
                return unserialize(self::$cache[$hashData][$hashKey]);
            }
        }
        return false;
    }

    private function addToCache(string $key, string $value, array $resValue)
    {
        $hashData = $this->getHashDataForCache($this->elements);
        $hashKey = $this->getHashKeyValueForCache($key, $value);

        if (array_key_exists($hashData, self::$cache)) {
            if (!array_key_exists($hashKey, self::$cache[$hashData])) {
                self::$cache[$hashData][$hashKey] = serialize($resValue);
            }
        } else {
            self::$cache[$hashData] = [$hashKey => serialize($resValue)];
        }
    }

    public function getHashKeyValueForCache($key, $value)
    {
        return md5($key . $value);
    }

    public function getHashDataForCache(array $value)
    {
        return md5(serialize($value));
    }

    public static function wrap($elements)
    {
        return new self($elements);
    }
    
    public function where($key, $value)
    {
        $cache = $this->getCache($key, $value);
        if ($cache) {
            return new self($cache);
        }

        $res = array_filter($this->elements, function ($item) use ($key, $value) {
            return (array_key_exists($key, $item) && $item[$key] === $value) ? true : false;
        });

        $this->addToCache($key, $value, $res);

        return new self($res);
    }
    
    public function all():array
    {
        return array_map(function ($value) {
            return (array) $value;
        }, $this->elements);
    }
}