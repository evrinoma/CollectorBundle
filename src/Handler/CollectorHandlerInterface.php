<?php
namespace Evrinoma\CollectorBundle\Handler;

use Evrinoma\CollectorBundle\Chain\CollectionInterface;

/**
 * Interface CollectorHandlerInterface
 *
 * @package Evrinoma\CollectorBundle\Handler
 */
interface CollectorHandlerInterface
{
    /**
     * @param CollectorHandlerInterface $handler
     *
     * @return CollectorHandlerInterface
     */
    public function setNext(CollectorHandlerInterface $handler): CollectorHandlerInterface;

    /**
     * @return mixed
     */
    public function handle();

    /**
     * @return string
     */
    public function getClass(): string;

    /**
     * @return mixed
     */
    public function collect();

    /**
     * @param CollectionInterface $collection
     *
     * @return AbstractCollectorHandler
     */
    public function setCollection(CollectionInterface &$collection): CollectorHandlerInterface;
}