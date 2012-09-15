<?php

namespace JustOneBlog;

use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class RouterFactory implements FactoryInterface{

    const ROUTES_CONFIG = 'routes.yml';

    private $configLocator;

    private $request;

    public function __construct(FileLocatorInterface $configLocator, Request $request){
        $this->configLocator = $configLocator;
        $this->request = $request;
    }

    public function get(){
        $requestContext = new RequestContext();
        $requestContext->fromRequest($this->request);

        return new Router(
            new YamlFileLoader($this->configLocator),
            self::ROUTES_CONFIG,
            array(),
            $requestContext
        );
    }
}