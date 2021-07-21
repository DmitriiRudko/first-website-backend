<?php

define(PRODUCTS_PER_PAGE, 2);
define(PAGINATION_INDICES_PER_PAGE, 5);

require_once(dirname(__FILE__) . "/../model/model_products.php");

class ControllerProducts extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function action_show_products($params = ["page" => 1]) {
        if (!empty($params) and $params['page'] > 0) {
            $product_id = ($params['page'] - 1) * PRODUCTS_PER_PAGE;
        } else {
            $product_id = 0;
        }

        $amount_of_products = $this->model->count_products();
        if ($product_id >= $amount_of_products) {
            $product_id = 0;
        }

        $data = $this->model->range_of_products($product_id, PRODUCTS_PER_PAGE);

        $page_info = [
            "products_amount" => $amount_of_products,
            "products_per_page" => PRODUCTS_PER_PAGE,
            "indices" => PAGINATION_INDICES_PER_PAGE,
        ];

        $this->view->generate("products_view.php", "template_view.php", $data, $page_info);
    }
}

?>