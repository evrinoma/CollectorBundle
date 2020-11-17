<?php


namespace Evrinoma\CollectorBundle\DependencyInjection;

use Evrinoma\CollectorBundle\EvrinomaCollectorBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class EvrinomaCollectorExtension
 *
 * @package Evrinoma\CollectorBundle\DependencyInjection
 */
class EvrinomaCollectorExtension extends Extension
{
//region SECTION: Fields
    private $container;
//endregion Fields

//region SECTION: Public
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
//endregion Public


//region SECTION: Getters/Setters
    public function getAlias()
    {
        return EvrinomaCollectorBundle::COLLECTOR_BUNDLE;
    }
//endregion Getters/Setters
}