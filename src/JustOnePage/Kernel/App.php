<?php

namespace JustOnePage\Kernel;

use JustOnePage\Kernel\ServiceContainerFactory;
use JustOnePage\Kernel\ConfigLocatorFactory;

class App{
    static function init(){
        $clFactory = new ConfigLocatorFactory();
        $factory = new ServiceContainerFactory(
                $clFactory->get()
            );
        $container = $factory->get();

        return $container;
    }
}