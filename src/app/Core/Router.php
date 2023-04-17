<?php

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function route()
    {
        // Get the route from the query string
        $route = $_GET['route'] ?? 'index';

        // Get the controller and method from the route
        $controllerMethod = $this->routes[$route] ?? null;
        if (!$controllerMethod) {
            header('HTTP/1.1 404 Not Found');
            echo '404 Not Found';
            return;
        }
        [$controllerName, $methodName] = explode('@', $controllerMethod);

        // Create the controller object and call the method
        $controller = new $controllerName();
        $controller->$methodName();
    }
}