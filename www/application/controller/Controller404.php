<?php

class Controller404 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function show404() {
        $this->view->generate("NotFoundView.php", "TemplateView.php");
    }
}
