<?php

namespace JustOneBlog\Kernel;

interface ControllerInvokerInterface{

    function invoke(array $route);

    function invokeFromGlobals();
}