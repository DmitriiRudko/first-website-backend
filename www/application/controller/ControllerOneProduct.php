<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../model/ModelReviews.php");

class ControllerOneProduct extends Controller {
    private $modelProducts;

    private $modelReviews;

    public function __construct() {
        parent::__construct();
        $this->modelProducts = new ModelProducts();
        $this->modelReviews = new ModelReviews();
    }

    public function showOneProduct() {
        $data = $this->modelProducts->oneProduct((int)$_GET['id']);
        if ($data !== null) {
            $reviews = $this->modelReviews->getProductReviews((int)$_GET['id']);
            $data["reviews"] = $reviews;
            $this->view->generate("one-product-view.php", "template-view.php", $data);
        } else {
            $this->view->generate("one-product-view.php", "template-view.php");
        }
    }
}
