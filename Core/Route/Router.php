<?php

class Router
{
    public array $routes;
    public function add(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null
        ];

        return $this;
    }

    public function get(string $uri, string $controller)
    {
        return $this->add($uri, $controller, "GET");
    }

    public function post(string $uri, string $controller)
    {
        return $this->add($uri, $controller, "POST");
    }

    public function put(string $uri, string $controller)
    {
        return $this->add($uri, $controller, "PUT");
    }

    public function delete(string $uri, string $controller)
    {
        return $this->add($uri, $controller, "DELETE");
    }

    public function only($authorized)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $authorized;
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {

                if ($route['middleware'] != null) {
                    if ($route['middleware'] === "authorized") {
                        if (isset($_SESSION['user'])) {
                            return require $route['controller'];
                        }
                        header("location: /akademi/index.php/signin");
                        exit();
                    }
                    if ($route['middleware'] === "guest") {
                        if (isset($_SESSION['user'])) {
                            header("location: /akademi/");
                            exit();
                        }
                    }
                }
                return require $route['controller'];
            }
        }
    }
}
