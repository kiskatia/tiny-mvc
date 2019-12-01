<?php

namespace Core;

use Dotenv\Dotenv;

class Env
{
    public static function loadDotenv()
    {
        if (! getenv('DB_HOST')) {
            $dotenv = new Dotenv(__DIR__.'/..');
            return $dotenv->load();
        }
        return null;
    }
}