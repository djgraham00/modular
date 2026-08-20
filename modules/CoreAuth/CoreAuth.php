<?php
namespace MPCoreAuth;

class CoreAuth extends \Modular\Module\AbstractModule
{
    public function __construct()
    {
        $this->getRoutes();
    }
}