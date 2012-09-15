<?php

require_once '../config/bootstrap.php';

use JustOneBlog\Kernel\ServiceContainerFactory;
use JustOneBlog\Kernel\ConfigLocatorFactory;

$clFactory = new ConfigLocatorFactory();
$factory = new ServiceContainerFactory(
        $clFactory->get()
    );
$container = $factory->get();

$invoker = $container->get('controller_invoker');

$invoker->invokeFromGlobals();