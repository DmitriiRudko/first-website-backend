<?php

namespace Application\Controller;
require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../helpers/SortHelper.php");
require_once(dirname(__FILE__) . "/../core/Controller.php");

use Application\Model\ModelProducts;
use Application\Helpers\SortHelper;
use Application\Core\Controller;

class ControllerProducts extends Controller {
    private const PRODUCTS_PER_PAGE = 6;

    private const PAGINATION_INDICES_PER_PAGE = 5;

    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function showProducts() {
        $page = (int)$_GET['page'] <= 0 ? 1 : (int)$_GET['page'];
        $productIndex = ($page - 1) * self::PRODUCTS_PER_PAGE;

        $amountOfProducts = $this->model->countProducts();
        if ($productIndex >= $amountOfProducts) {
            $productIndex = 0;
        }

        $sortInfo = SortHelper::parseSortType();
        $data = $this->model->rangeOfProducts($productIndex, self::PRODUCTS_PER_PAGE, $sortInfo["key"], $sortInfo["direction"]);

        $pageInfo = [
            "products_amount" => $amountOfProducts,
            "products_per_page" => self::PRODUCTS_PER_PAGE,
            "indices" => self::PAGINATION_INDICES_PER_PAGE,
        ];

        $this->view->generate("products-view.php", $data, $pageInfo);
    }


}
