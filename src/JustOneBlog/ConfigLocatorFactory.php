<?php

namespace JustOneBlog;

use Symfony\Component\Config\FileLocator;

class ConfigLocatorFactory implements FactoryInterface{

    public function get(){
        return new FileLocator(__DIR__ . '/../../config/');
    }
}