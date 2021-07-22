<?php

define(PRODUCTS_PER_PAGE, 2);
define(PAGINATION_INDICES_PER_PAGE, 5);

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");

class ControllerProducts extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function showProducts($params = ["page" => 1]) {
        if (!empty($params) and $params['page'] > 0) {
            $productId = ($params['page'] - 1) * PRODUCTS_PER_PAGE;
        } else {
            $productId = 0;
        }

        $amountOfProducts = $this->model->countProducts();
        if ($productId >= $amountOfProducts) {
            $productId = 0;
        }

        $data = $this->model->rangeOfProducts($productId, PRODUCTS_PER_PAGE);

        $pageInfo = [
            "products_amount" => $amountOfProducts,
            "products_per_page" => PRODUCTS_PER_PAGE,
            "indices" => PAGINATION_INDICES_PER_PAGE,
        ];

        $this->view->generate("ProductsView.php", "TemplateView.php", $data, $pageInfo);
    }
}

?>