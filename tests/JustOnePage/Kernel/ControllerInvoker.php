<?php

namespace JustOnePage\Kernel;

class MockController{

    public static $watched;

    public function doAction(){
        \call_user_func(self::$watched);
    }
}

describe("the ControllerInvoker", function(){
    $invoker = null;
    
    before_each(function() use ($invoker){
        $invoker = new ControllerInvoker();
    });

    it("calls a method of a controller", function() use ($invoker){
        $routeInfo = array(
                '_controller' => 'JustOnePage\\Kernel\\MockController::doAction',
            );

        MockController::$watched = \pecs\watched(function(){});

        expect(MockController::$watched)->to_have_been_called();
    });
    
});