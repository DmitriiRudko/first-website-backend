<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");

class ControllerOneProduct extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function showOneProduct() {
        $data = $this->model->oneProduct($_GET['id']);

        if ($data !== null) {
            $this->view->generate("OneProductView.php", "TemplateView.php", $data);
        } else {
            // редирект на 404
        }
    }
}
