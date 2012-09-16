<?php

require_once '../vendor/noonat/pecs/lib/pecs.php';
require_once '../config/bootstrap.php';

use Symfony\Component\Finder\Finder;

$testFinder = new Finder();
$testFinder->name('*.php')->exclude(__FILE__)->in(__DIR__);

foreach($testFinder as $testFile){
    include_once $testFile;
}

$formatter = new \pecs\HtmlFormatter();
\pecs\run($formatter);