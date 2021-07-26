<?php

namespace Application\Core;
require_once(dirname(__FILE__) . "/../controller/Controller404.php");
require_once(dirname(__FILE__) . "/../controller/ControllerAddProduct.php");
require_once(dirname(__FILE__) . "/../controller/ControllerAddReview.php");
require_once(dirname(__FILE__) . "/../controller/ControllerAdmin.php");
require_once(dirname(__FILE__) . "/../controller/ControllerOneProduct.php");
require_once(dirname(__FILE__) . "/../controller/ControllerProducts.php");

use Application\Controller\Controller404;
use Application\Controller\ControllerAddProduct;
use Application\Controller\ControllerAddReview;
use Application\Controller\ControllerAdmin;
use Application\Controller\ControllerOneProduct;
use Application\Controller\ControllerProducts;

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
        $controllerName = "Application\Controller\Controller" . $controllerName;

        if (!file_exists("application/controller/" . $controllerFile)) {
            self::throw404();
            return;
        }

        $controller = new $controllerName();

        if (!method_exists($controllerName, $actionName)) {
            self::throw404();
            return;
        }

        $controller->$actionName();
    }

    public static function throw404() {
        $controller = new Controller404();
        $controller->show404();
    }
}
