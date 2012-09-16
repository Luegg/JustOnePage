<?php

namespace JustOnePage\Kernel;

interface ControllerInvokerInterface{

    function invoke(array $route);

    function invokeFromGlobals();
}