<?php

namespace Core;

class Router
{

    function __construct()
    {
        session_start();

        $uri = urldecode(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
            return false;
        }

        $uri = rtrim($uri, '/');
        $uri = explode('/', $uri);

        if (count($uri) > 1) {
            $controllerName = CONTROLLERS . $uri[1];
            if (class_exists($controllerName)) {
                $controller = new  $controllerName;
                if (method_exists($controller, $uri[2])) {
                    if (isset($uri[3])) {
                        $controller->{$uri[2]}($uri[3]);
                    } else {
                        $controller->{$uri[2]}();
                    }
                } else {
                    $controller = new \App\Controllers\Error();
                    return false;
                }
            } else {
                $controller = new \App\Controllers\Error();
                return false;
            }
        } else {
            // load home index 
            $controller = new \App\Controllers\Home();
            $controller->index();
        }
    }
}
