<?php

namespace Core;

class View
{

    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        
        $file = dirname(__DIR__) . "\\App\\$view";  // relative to Core directory
        
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file not found");
        }
    }
}