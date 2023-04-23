<?php

/**
 * Router class for routing requests to appropriate controllers and methods.
 */
class Router
{
    /*
     * @var array $routes The list of routes available.
     */
    private array $routes;

    /**
     * Constructor function for the Router class.
     *
     * @param array $routes The list of routes available.
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Route function to process the request and route it to the appropriate controller and method.
     *
     * @return void
     */
    public function route(): void
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