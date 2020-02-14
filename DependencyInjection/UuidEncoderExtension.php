<?php

namespace Gubler\UuidEncoderBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class UuidEncoderExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        $default = $container->getDefinition('gubler.uuid_encoder.default_encoder');
        $default->replaceArgument(0, $config['charset']['default']);

        $default = $container->getDefinition('gubler.uuid_encoder.url_encoder');
        $default->replaceArgument(0, $config['charset']['url']);

        $default = $container->getDefinition('gubler.uuid_encoder.filesystem_encoder');
        $default->replaceArgument(0, $config['charset']['filesystem']);
    }
}
