<?php

namespace JustOneBlog\Kernel;

use Symfony\Component\Config\FileLocator;

class ConfigLocatorFactory implements FactoryInterface{

    public function get(){
        return new FileLocator(__DIR__ . '/../../../config/');
    }
}