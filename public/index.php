<?php

require __DIR__ . '/../vendor/autoload.php';

Core\Env::loadDotenv();

$router = new Core\Router();

$router->addRoute('/', [
	'controller' => 'Home',
	'action' => 'index'
]);

$request = new Core\Request();
$router->execute($request);