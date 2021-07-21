<?php

class Route {
    public static function start() {

        $controller = "Products";
        $action = "show_products";

        $route = explode("/", $_SERVER["REQUEST_URI"]);
        if (!empty($route[-2])) {
            $controller = $route[-2];
        }
        if (!empty($route[-1])) {
            $action = $route[-1];
        }

        $controller_file = "controller_" . strtolower($controller) . ".php";
        $controller = "Controller" . $controller;
        $action = "action_" . $action;

        if (file_exists("application/controller/" . $controller_file)) {
            include "application/controller/" . $controller_file;
        }
        $controller = new $controller();
        if (method_exists($controller, $action)) {
            $controller->$action($_GET);
        }

    }
}

?>