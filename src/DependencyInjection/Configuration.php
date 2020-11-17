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

        return $treeBuilder;
    }
//endregion Getters/Setters
}
