<?php

namespace JustOnePage\Kernel;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;


class ControllerInvoker{

    const CONTROLLER_OPTION = '_controller';

    private $router;

    private $request;

    function __construct(RouterInterface $router = null, Request $request = null){
        $this->router = $router;
        $this->request = $request;
    }

    function invokeFromGlobals(){
        $route = $this->router->match($this->request->getPathInfo());
        $this->invoke($route);
    }

    function invoke(array $route){
        list($controllerName, $actionName) = explode("::", $route[self::CONTROLLER_OPTION]);

        $controllerReflection = new \ReflectionClass($controllerName);
        $actionReflection = $controllerReflection->getMethod($actionName);
        $params = $actionReflection->getParameters();

        $args = array();
        foreach($params as $param){
            if(array_key_exists($param->getName(), $route)){
                $args[] = $route[$param->getName()];
            } else if(!$param->isOptional()){
                throw new InvocationException("Parameter '{$param->getName()}' is not set and required");
            }
        }

        $controller = new $controllerName;
        return call_user_func_array(array($controller, $actionName), $args);
    }

}