<?php

namespace Evrinoma\CollectorBundle\Manager;

use Evrinoma\CollectorBundle\Chain\CollectionInterface;
use Evrinoma\CollectorBundle\Handler\CollectorHandlerInterface;
use Evrinoma\UtilsBundle\Rest\RestTrait;

/**
 * Class CollectorManager
 *
 * @package Evrinoma\CollectorBundle\Manager
 */
final class CollectorManager implements CollectorManagerInterface
{
    use RestTrait;

//region SECTION: Fields
    /**
     * @var CollectorHandlerInterface []
     */
    private array $handlers = [];
    /**
     * @var ?CollectorHandlerInterface
     */
    private ?CollectorHandlerInterface $handler = null;
    /**
     * @var ?CollectorHandlerInterface
     */
    private ?CollectorHandlerInterface $chain = null;
    /**
     * @var ?CollectionInterface
     */
    private ?CollectionInterface $collection = null;
    /**
     * @var string
     */
    private string $serializeGroup;
//region SECTION: Public
    public function setChain(CollectorHandlerInterface $handler):void
    {
        if ($this->handler) {
            $this->handler->setNext($handler);
        } else {
            $this->chain   = &$handler;
        }
        $this->handler = $handler;
        $this->handlers[$handler->getClass()] = &$handler;
    }

//endregion Getters/Setters

    public function setCollection(CollectionInterface $collection):void
    {
        $this->collection = $collection;
    }

    public function run():CollectionInterface
    {
        $this->chain->setCollection($this->collection)->handle();

        return $this->collection;
    }


    public function get(string $key):CollectionInterface
    {
        if (array_key_exists($key,$this->handlers)) {
            $this->handlers[$key]->setCollection($this->collection)->iterate();
        }

        return $this->collection;
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @return int
     */
    public function getRestStatus(): int
    {
        return $this->status;
    }


    public function setSerializeGroup($serializeGroup):void
    {
        $this->serializeGroup = $serializeGroup;
    }

    /**
     * @return string
     */
    public function getSerializeGroup(): string
    {
        return $this->serializeGroup;
    }
//endregion Getters/Setters
}
