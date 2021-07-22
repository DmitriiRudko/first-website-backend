<?php

define(PRODUCTS_PER_PAGE, 4);
define(PAGINATION_INDICES_PER_PAGE, 5);

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");

class ControllerProducts extends Controller {
    private const PRODUCTS_PER_PAGE = 4;
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function showProducts() {
        if ($_GET['page'] > 0) {
            $productId = ($_GET['page'] - 1) * PRODUCTS_PER_PAGE;
        } else {
            $productId = 0;
        }

        $amountOfProducts = $this->model->countProducts();
        if ($productId >= $amountOfProducts) {
            $productId = 0;
        }

        $data = $this->model->rangeOfProducts($productId, PRODUCTS_PER_PAGE, $_GET['sortType']);

        $pageInfo = [
            "products_amount" => $amountOfProducts,
            "products_per_page" => PRODUCTS_PER_PAGE,
            "indices" => PAGINATION_INDICES_PER_PAGE,
        ];

        $this->view->generate("ProductsView.php", "TemplateView.php", $data, $pageInfo);
    }
}
