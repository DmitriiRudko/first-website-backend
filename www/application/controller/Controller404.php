<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");

class Controller404 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function show404() {
        $this->view->generate("not-found-view.php", "template-view.php");
    }
}
