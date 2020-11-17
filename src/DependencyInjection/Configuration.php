<?php


namespace Evrinoma\CollectorBundle\DependencyInjection;

use Evrinoma\CollectorBundle\EvrinomaCollectorBundle;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Evrinoma\CollectorBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
//region SECTION: Getters/Setters
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(EvrinomaCollectorBundle::COLLECTOR_BUNDLE);
        $rootNode    = $treeBuilder->getRootNode();

        $rootNode->children()
            ->arrayNode('settings')
                ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('serialize_group')->defaultValue('collector')
                            ->info('This option is used for group serialize')
                        ->end()
                        ->scalarNode('collector')->defaultValue('Evrinoma\CollectorBundle\Chain\Collection')
                            ->info('Result collection class')
                        ->end()
                        ->arrayNode('list')
                            ->info('List default values.')
                            ->prototype('scalar')->end()
                            ->defaultValue([])
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
//endregion Getters/Setters
}
