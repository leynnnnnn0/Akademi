<?php

class Router 
{
    private array $routes;
    public function add(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            "uri"=> $uri,
            "controller"=> $controller,
            "method"=> $method
        ];
    }

    public function get(string $uri, string $controller)
    {
        $this->add($uri, $controller, "GET");
    }

    public function post(string $uri, string $controller)
    {
        $this->add($uri, $controller,"POST");
    }

    public function put(string $uri, string $controller)
    {
        $this->add($uri, $controller,"PUT");
    }

    public function delete(string $uri, string $controller)
    {
        $this->add($uri, $controller,"DELETE");
    }

    public function route(string $uri, string $method)
    {
        foreach($this->routes as $route)
        {
            if($route['uri'] === $uri && $route['method'] === $method)
            {
                return require $route['controller'];
            }
        }
    }
}