<?php

require_once(dirname(__FILE__) . "/../model/model_products.php");

class ControllerProducts extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = ModelProducts::get_instance();
    }

    public function action_show_products()
    {
        $this->model->get_data();
        $this->view->generate("products_view.php", "template_view.php", $data);
    }
}

?>