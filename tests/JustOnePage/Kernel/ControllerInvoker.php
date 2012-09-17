<?php

namespace JustOnePage\Kernel;

class MockController{

    public static $watched;

    public function doAction(){
        \call_user_func(self::$watched);
    }

    public function doMore($id, $format){
        \call_user_func_array(self::$watched, func_get_args());
    }
}

describe("the ControllerInvoker", function(){

    before_each(function(){
        MockController::$watched = \pecs\watched(function(){});
    });

    it("calls a method of a controller", function(){
        $routeInfo = array(
                '_controller' => 'JustOnePage\\Kernel\\MockController::doAction',
            );

        $invoker = new ControllerInvoker();
        $invoker->invoke($routeInfo);

        expect(MockController::$watched)->to_have_been_called();
    });
    
    it("passes the route arguments to the method", function(){
        $routeInfo = array(
                '_controller' => 'JustOnePage\\Kernel\\MockController::doMore',
                'id' => 123,
                'format' => 'html',
            );

        $invoker = new ControllerInvoker();
        $invoker->invoke($routeInfo);

        expect(MockController::$watched)->to_have_been_called_with(123, 'html');
    });
    
    it("throws InvocationException if required argument is not set", function(){
        $routeInfo = array(
                '_controller' => 'JustOnePage\\Kernel\\MockController::doMore',
                'id' => 123,
            );

        $invoker = new ControllerInvoker();
        expect(function() use($invoker, $routeInfo){
                $invoker->invoke($routeInfo);
            })->to_throw('JustOnePage\\Kernel\\InvocationException', "Parameter 'format' is not set and required");
    });

});