<?php

namespace Core;

use Exception;

class Router
{
    private $routes = [];
    private $params = [];

    public function addCallableRoute($route, callable $closure)
    {
        $this->routes[$route] = $closure;
    }

    public function addRoute($route, array $params = [])
    {
        $this->routes[$route] = $params;
    }

    public function execute(Request $request)
    {
        $url = $request->url;

        if (!$this->match($url)) {
            return header("HTTP/1.0 404 Not Found");
        }

        $controller = $this->getControllerPath();

        if (!class_exists($controller)) {
            throw new Exception("Controller class $controller not found");
        }

        $controllerObj = new $controller($this->params);
        $action = $this->convertToCamelCase($this->params['action']);

        if (preg_match('/action$/i', $action) != 0) {
            throw new Exception("Remove the Action suffix to call this method");
        }

        return $controllerObj->$action();
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getParams()
    {
        return $this->params;
    }

    private function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    private function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    private function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }

    private function getControllerPath()
    {
        $controller = $this->convertToStudlyCaps($this->params['controller']);
        return $this->getNamespace() . $controller . 'Controller';
    }

    private function match($url)
    {
        if (!array_key_exists($url, $this->routes)) {
            return false;
        }
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                foreach($params as $key => $value) {
                    $matches[$key] = $value;
                }
            }
        }
        $this->params = $matches;
        return true;
    }
}