<?php

namespace JustOnePage\Kernel;

use Symfony\Component\Config\FileLocator;

class ConfigLocatorFactory implements FactoryInterface{

    private static $relConfigDir = '../../../config';

    function get(){
        return new FileLocator(__DIR__ . '/' . self::$relConfigDir);
    }
}