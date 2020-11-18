<?php


namespace Evrinoma\CollectorBundle\Chain;


/**
 * Class Collection
 *
 * @package Evrinoma\CollectorBundle\Chain
 */
class Collection implements CollectionInterface
{
    /**
     * @Groups('collector')
     * @var array
     */
    private $collection = [];

    public function add(string $key, $value)
    {
        $this->collection[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key,$this->collection);
    }
}