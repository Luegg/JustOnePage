<?php

namespace JustOneBlog;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

class App{
    private $container;

    private $router;

    private $request;

    function __construct(ContainerInterface $container, RouterInterface $router, Request $request){
        $this->container = $container;
        $this->router = $router;
        $this->request = $request;
    }

    function get($service){
        return $this->container->get($service);
    }

    function getRouter(){
        return $this->router;
    }

    function getRequest(){
        return $this->request;
    }
}