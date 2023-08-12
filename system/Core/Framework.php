<?php

namespace System\Core;

use System\Exceptions\NotControllerException;

class Framework {

    public function __construct() {
        session_start();
    }

    public function start() {
        try {
            $this->loadController($this->getUrlParts());
        } catch(\Throwable $e) {
            if(config('debug')) {
                $whoops = new \Whoops\Run;
                $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
                $whoops->handleException($e);
            } else {
                echo "<h1>There seems to be some problem.</h1>";
            }
        }
    }

    private function getUrlParts(): array {
        $full = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        if(!empty($_SERVER['QUERY_STRING'])) {
            $full = str_replace("?{$_SERVER['QUERY_STRING']}", '', $full);
        }

        return explode('/', str_replace(config('app_url'), '', $full));
    }

    private function loadController(array $parts) {
        $controller = ucfirst(!empty($parts[0]) ? $parts[0] : config('default_controller'));
            
        $class = "App\Controllers\\{$controller}Controller";

        $obj = new $class;

        if($obj instanceof Controller) {
            $method = !empty($parts[1]) ? $parts[1] : 'index';

            if(!empty($parts[2])) {
                $obj->{$method}($parts[2]);
            } else {
                $obj->{$method}();
            }
        } else {
            throw new NotControllerException("class '{$class}' must inherit from class 'System\Core\Controller'.");
        }
    }
}