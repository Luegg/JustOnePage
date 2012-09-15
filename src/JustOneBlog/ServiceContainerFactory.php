<?php

namespace JustOneBlog;

use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ServiceContainerFactory implements FactoryInterface{

    const SERVICE_CONFIG = 'services.yml';

    private $configLocator;

    public function __construct(FileLocatorInterface $configLocator){
        $this->configLocator = $configLocator;
    }

    public function get(){
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, $this->configLocator);
        $loader->load(self::SERVICE_CONFIG);
        return $container;
    }
}