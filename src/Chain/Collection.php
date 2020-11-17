<?php


namespace Evrinoma\CollectorBundle\Chain;


class Collection implements CollectionInterface
{
    private $collection = [];

    public function add(string $key, $value)
    {
        $this->collection[$key] = $value;
    }
}