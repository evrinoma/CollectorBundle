<?php


namespace Evrinoma\CollectorBundle\DependencyInjection;

use Evrinoma\CollectorBundle\EvrinomaCollectorBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

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
        $configuration   = $this->getConfiguration($configs, $container);
        $config          = $this->processConfiguration($configuration, $configs);
        $this->container = $container;
        $settings        = $config['settings'];
        if ($settings['list']) {
            $definition = $this->container->getDefinition('evrinoma.collector.manager');
            foreach ($settings['list'] as $item) {
                $definition->addMethodCall('setChain', [new Reference($item)]);
            }
            $definition->addMethodCall('setCollection', [new Reference($settings['collector'])]);
            $definition->addMethodCall('setSerializeGroup', [$settings['serialize_group']]);
        }
    }
//endregion Public


//region SECTION: Getters/Setters
    public function getAlias()
    {
        return EvrinomaCollectorBundle::COLLECTOR_BUNDLE;
    }
//endregion Getters/Setters
}