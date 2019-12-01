<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function renderTemplate($template, array $args = [])
    {
        $template = $template . '.html.twig';
        $loader = new FilesystemLoader(template_path());
        $twig = new Environment($loader, [
            'debug' => true,
            'cache' => template_cache_path()
        ]);

        echo $twig->render($template, $args);
    }
}