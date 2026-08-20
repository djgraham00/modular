<?php

/*
    MODULAR v2026.8 - DEV
    Created by: Drew Graham
    https://www.github.com/djgraham00
    License: MIT
*/

namespace Modular;

class Kernel
{
    private array $module_classes = [];
    private array $module_instances = [];
    private array $route_map = [];

    public function __construct()
    {
        /* Modular Dynamic Loading */
        $module_dirs = array_diff(scandir("../modules"), ['.', '..']);
        //Loop through the potential modules
        foreach ($module_dirs as $dir)
        {
            if (file_exists("../modules/$dir/$dir.php") && file_exists("../modules/$dir/config.json") )
            {
                $config = json_decode(file_get_contents("../modules/$dir/config.json"), true);
                require("../modules/$dir/$dir.php");
                $this->module_classes[] = "{$config["namespace"]}\\{$dir}";
            }
        }
    }
    public function run() : void
    {


        /* Step 1: Instantiate modules */
        foreach ($this->module_classes as $module_class)
        {
            $this->module_instances[$module_class] = new $module_class();

        }

        var_dump($this->module_instances);
        return;


        $parsed_url = $this->parse_uri(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );
        echo "Hello, World!";
    }

    private function parse_uri(string $uri) : array
    {
        $url_segments = explode('/', $uri);

        var_dump($url_segments);

        return [];
    }

}