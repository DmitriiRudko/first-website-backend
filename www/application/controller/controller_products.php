<?php

require_once("../model/model_products.php");

class ControllerProducts extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = ModelProducts::get_instance();
    }

    public function action_show_products()
    {
        $data = $this->model->get_data();
        $this->view->generate("products_view.php", "template_view.php", $data);
    }

}

?>