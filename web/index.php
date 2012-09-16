<?php

require_once '../config/bootstrap.php';

use JustOneBlog\Kernel\App;

$app = App::init();

$invoker = $app->get('controller_invoker');
$invoker->invokeFromGlobals();