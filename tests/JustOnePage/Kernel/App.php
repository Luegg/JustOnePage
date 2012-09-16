<?php

use JustOnePage\Kernel\App;

describe("the App class", function(){

    it("initializes a dependency injection container", function(){
        expect(App::init())->to_be_an_instance_of('Symfony\\Component\\DependencyInjection\\ContainerInterface');
    });
});