<?php

namespace Configuration;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class Bootstrap
 */
class Bootstrap
{

    /**
     * @return ContainerInterface
     */
    public static function buildContainer()
    {
        $containerBuilder = new ContainerBuilder();

        $yamlLoader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__ . '/Container/'));
        $yamlLoader->load('services.yml');

        $containerBuilder->compile();

        return $containerBuilder;
    }
}
