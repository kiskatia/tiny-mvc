<?php

namespace Core;

use Dotenv\Dotenv;

class Env
{
    public static function loadDotenv()
    {
        if (! getenv('DB_HOST')) {
            $dotenv = Dotenv::createMutable(__DIR__ . '/..');
            return $dotenv->load();
        }
    }
}