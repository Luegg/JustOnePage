<?php

namespace JustOneBlog;

use Symfony\Component\HttpFoundation\Request;

class RequestFactory implements FactoryInterface{

    public function get(){
        return Request::createFromGlobals();
    }
}