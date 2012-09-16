<?php

namespace JustOnePage\Kernel;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

class ControllerInvoker{

    private $router;

    private $request;

    function __construct(RouterInterface $router, Request $request){
        $this->router = $router;
        $this->request = $request;
    }

    function invokeFromGlobals(){
        $route = $this->router->match($this->request->getPathInfo());
        $this->invoke($route);
    }

    function invoke(array $route){

    }
}