<?php

class Route {

    private static $routes = Array();

    private $uri;
    private $callback;

    private function __construct($uri, $callback) {
        $this->uri = $uri;
        $this->callback = $callback;

        return $this;
    }

    public static function create($uri, $callback) {
        self::$routes[] = new Route($uri, $callback);
    }

    public static function run() {
        $currentUri = $_SERVER['REQUEST_URI'];

        foreach (self::$routes as $route) {
            if ($route->uri != $currentUri) continue;

            call_user_func($route->callback);

            return;
        }

        View::show();
    }
}