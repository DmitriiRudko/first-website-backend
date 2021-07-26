<?php

namespace Application\Controller;
require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../core/Controller.php");

use Application\Core\Controller;
use Application\Model\ModelProducts;

class Controller404 extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function show404() {
        http_response_code(404);
        $this->view->generate("not-found-view.php");
    }
}
