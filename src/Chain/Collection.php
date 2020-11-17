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
}