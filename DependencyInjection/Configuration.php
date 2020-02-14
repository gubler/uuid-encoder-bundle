<?php

namespace Gubler\UuidEncoderBundle\DependencyInjection;

use Gubler\UuidEncoder\UuidEncoder;
use Gubler\UuidEncoderBundle\Util\FilesystemUuidEncoder;
use Gubler\UuidEncoderBundle\Util\UrlUuidEncoder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('gubler_uuid_encoder');

        $treeBuilder->getRootNode()
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('charset')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('default')->defaultValue(UuidEncoder::DEFAULT_CHARSET)->end()
                    ->scalarNode('url')->defaultValue(UrlUuidEncoder::URL_CHARSET)->end()
                    ->scalarNode('filesystem')->defaultValue(FilesystemUuidEncoder::FILESYSTEM_CHARSET)->end()
                ->end()
            ->end()
        ->end()
        ;

        return $treeBuilder;
    }
}
