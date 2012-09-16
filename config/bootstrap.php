<?php

require_once '../vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';
require_once '../vendor/symfony/class-loader/Symfony/Component/ClassLoader/DebugUniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Symfony\Component\ClassLoader\DebugUniversalClassLoader;

call_user_func(function(){
    $loader = new UniversalClassLoader();

    $loader->registerNamespaces(array(
            'Symfony\\Component\\ClassLoader' => __DIR__ . '/../vendor/symfony/class-loader',
            'Symfony\\Component\\Config' => __DIR__ . '/../vendor/symfony/config',
            'Symfony\\Component\\DependencyInjection' => __DIR__ . '/../vendor/symfony/dependency-injection',
            'Symfony\\Component\\Finder' => __DIR__ . '/../vendor/symfony/finder',
            'Symfony\\Component\\HttpFoundation' => __DIR__ . '/../vendor/symfony/http-foundation',
            'Symfony\\Component\\Routing' => __DIR__ . '/../vendor/symfony/routing',
            'Symfony\\Component\\Yaml' => __DIR__ . '/../vendor/symfony/yaml',
            'JustOnePage' => __DIR__ . '/../src',
        ));

    $loader->register();
});