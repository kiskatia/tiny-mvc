<?php

namespace Core;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View
{
    public static function renderTemplate($template, array $args = [])
    {
        $template = $template . '.html.twig';
        $loader = new Twig_Loader_Filesystem(template_path());
        $twig = new Twig_Environment($loader, [
            'debug' => true,
            'cache' => template_cache_path()
        ]);

        echo $twig->render($template, $args);
    }
}