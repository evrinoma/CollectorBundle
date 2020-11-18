<?php


namespace Evrinoma\CollectorBundle\Handler;


use Evrinoma\CollectorBundle\Chain\CollectionInterface;

abstract class AbstractCollectorHandler implements CollectorHandlerInterface
{
//region SECTION: Fields
    /**
     * @var CollectionInterface
     */
    private $collection;

    /**
     * @var CollectorHandlerInterface
     */
    private $nextHandler;
//endregion Fields

//region SECTION: Public
    public function handle():void
    {
       $this->iterate();

        if ($this->nextHandler) {
            $this->nextHandler->setCollection($this->collection)->handle();
        }
    }

    public function iterate():void
    {
        if (!$this->collection->has($this->getClass())) {
            $this->collection->add($this->getClass(),$this->collect());
        }
    }
    //endregion Public

//region SECTION: Getters/Setters
    public function getClass(): string
    {
        return static::class;
    }

    final public function setNext(CollectorHandlerInterface $handler): CollectorHandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    /**
     * @param CollectionInterface $collection
     *
     * @return AbstractCollectorHandler
     */
    public function setCollection(CollectionInterface &$collection): CollectorHandlerInterface
    {
        $this->collection = $collection;

        return $this;
    }
//endregion Getters/Setters
}