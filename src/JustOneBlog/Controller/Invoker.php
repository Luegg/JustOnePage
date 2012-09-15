<?php

namespace JustOneBlog\Controller;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

class Invoker{

    private $router;

    private $request;

    function __construct(RouterInterface $router, Request $request){
        $this->router = $router;
        $this->request = $request;
    }

    function invokeFromGlobals(){
        $route = $this->router->match($this->request->getPathInfo());
        var_dump($route);
        $this->invoke($route);
    }

    function invoke(array $route){

    }
}