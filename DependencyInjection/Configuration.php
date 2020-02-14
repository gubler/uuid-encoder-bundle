<?php

namespace Gubler\UuidEncoderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('gubler_uuid_encoder');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('charset')
                ->children()
                    ->scalarNode('default')->end()
                    ->scalarNode('url')->end()
                    ->scalarNode('filesystem')->end()
                ->end()
            ->end()
        ->end()
        ;

        return $treeBuilder;
    }
}
