<?php


class Route {
    public static function start() {
        $route = explode("/", $_SERVER["REQUEST_URI"]);
        $route[2] = explode("?", $route[2])[0];

        if (!empty($route[1])) {
            $controllerName = $route[1];
        } else {
            $controllerName = "Products";
        }

        if (!empty($route[2])) {
            $actionName = $route[2];
        } else {
            $actionName = "showProducts";
        }

        $controllerFile = "Controller" . $controllerName . ".php";
        $controllerName = "Controller" . $controllerName;

        if (file_exists("application/controller/" . $controllerFile)) {
            include "application/controller/" . $controllerFile;
        } else {
            include "application/controller/Controller404.php";
            $controller = new Controller404();
            $controller->show404();
            return;
        }

        $controller = new $controllerName();
        if (method_exists($controllerName, $actionName)) {
            $controller->$actionName();
        } else {
            include "application/controller/Controller404.php";
            $controller = new Controller404();
            $controller->show404();
        }
    }
}
