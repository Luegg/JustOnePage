<?php

require_once '../config/bootstrap.php';

use JustOnePage\Kernel\App;

$app = App::init();

$router = $app->get('router');
$request = $app->get('request');
$invoker = $app->get('controller_invoker');

$route = $router->match($request->getPathInfo());
$invoker->invoke($route);