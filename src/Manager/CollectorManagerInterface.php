<?php


namespace Evrinoma\CollectorBundle\Manager;


use Evrinoma\CollectorBundle\Chain\CollectionInterface;
use Evrinoma\CollectorBundle\Handler\CollectorHandlerInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface CollectorManagerInterface
 *
 * @package Evrinoma\CollectorBundle\Manager
 */
interface CollectorManagerInterface extends RestInterface
{
//region SECTION: Getters/Setters
    public function getSerializeGroup(): string;

    public function setChain(CollectorHandlerInterface $handler): void;

    public function setCollection(CollectionInterface $collection): void;

    public function setSerializeGroup($serializeGroup): void;
//endregion Getters/Setters

}