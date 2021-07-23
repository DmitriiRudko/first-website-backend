<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../helpers/SortHelper.php");


class ControllerProducts extends Controller {
    private const PRODUCTS_PER_PAGE = 4;

    private const PAGINATION_INDICES_PER_PAGE = 5;

    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function showProducts() {
        if ($_GET['page'] > 0) {
            $productIndex = ($_GET['page'] - 1) * $this::PRODUCTS_PER_PAGE;
        } else {
            $productIndex = 0;
        }

        $amountOfProducts = $this->model->countProducts();
        if ($productIndex >= $amountOfProducts) {
            $productIndex = 0;
        }

        $sortInfo = SortHelper::parseSortType();
        $data = $this->model->rangeOfProducts($productIndex, $this::PRODUCTS_PER_PAGE, $sortInfo["key"], $sortInfo["direction"]);

        $pageInfo = [
            "products_amount" => $amountOfProducts,
            "products_per_page" => $this::PRODUCTS_PER_PAGE,
            "indices" => $this::PAGINATION_INDICES_PER_PAGE,
        ];

        $this->view->generate("products-view.php", "template-view.php", $data, $pageInfo);
    }


}
