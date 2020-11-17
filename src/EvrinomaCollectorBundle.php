<?php


namespace Evrinoma\CollectorBundle;


use Evrinoma\CollectorBundle\DependencyInjection\EvrinomaCollectorExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;


/**
 * Class EvrinomaCollectorBundle
 *
 * @package Evrinoma\CollectorBundle
 */
class EvrinomaCollectorBundle extends Bundle
{
    public const COLLECTOR_BUNDLE = 'collector';

//region SECTION: Getters/Setters
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaCollectorExtension();
        }

        return $this->extension;
    }
//endregion Getters/Setters
}