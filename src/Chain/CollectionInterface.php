<?php


namespace Evrinoma\CollectorBundle\Chain;

/**
 * Interface CollectionInterface
 *
 * @package Evrinoma\CollectorBundle\Chain
 */
interface CollectionInterface
{
//region SECTION: Public
    public function add(string $key, $value);
//endregion Public
}