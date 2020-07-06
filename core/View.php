<?php

namespace Core;

class View
{

    public static function render($template, $args = [])
    {
        static $blade = null;

        if ($blade === null) {
            $blade = new \Jenssegers\Blade\Blade(dirname(__DIR__) . '/App/Views', dirname(__DIR__) . '/Cache/Views');
        }

        echo $blade->render($template, $args);
    }
}
