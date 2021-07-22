<?php


class Route {
    public static function start() {

        $controllerName = "Products";
        $actionName = "ShowProducts";
        $route = explode("/", $_SERVER["REQUEST_URI"]);
        $route[2] = explode("?", $route[2])[0];

        if (!empty($route[1])) {
            $controllerName = $route[1];
        }
        if (!empty($route[2])) {
            $actionName = $route[2];
        }

        $controllerFile = "Controller" . $controllerName . ".php";
        $controllerName = "Controller" . $controllerName;

        echo $controllerFile;

        if (file_exists("application/controller/" . $controllerFile)) {
            include "application/controller/" . $controllerFile;
        }

        $controller = new $controllerName();
        if (method_exists($controllerName, $actionName)) {
            $controller->$actionName();
        }

    }
}
