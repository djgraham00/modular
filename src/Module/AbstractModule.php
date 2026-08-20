<?php

namespace Modular\Module;

class AbstractModule
{

    public function getRoutes() : array
    {
        echo "Hello from AbstractModule! <br/>";
        return ["Testing"];
    }

}