<?php

class Route {
    public static function start() {

        $controllerName = "Products";
        $actionName = "showProducts";

        $route = explode("/", $_SERVER["REQUEST_URI"]);
        if (!empty($route[-2])) {
            $controllerName = $route[-2];
        }
        if (!empty($route[-1])) {
            $actionName = $route[-1];
        }

        $controllerFile = "Controller" . $controllerName . ".php";
        $controllerName = "Controller" . $controllerName;

        if (file_exists("application/controller/" . $controllerFile)) {
            include "application/controller/" . $controllerFile;
        }

        $controller = new $controllerName();
        if (method_exists($controllerName, $actionName)) {
            $controller->$actionName($_GET);
        }

    }
}

?>