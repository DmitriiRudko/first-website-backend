<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");

class ControllerAddProduct extends Controller {
    private const NAME_MAX_LEN = 30;

    private const BARCODE_LEN = 10;

    private const DESCRIPTION_MAX_LEN = 250;

    private const MAX_PRICE = 0x7FFFFFFF;

    public function __construct() {
        parent::__construct();
        $this->model = new ModelProducts();
    }

    public function newProductPage() {
        $this->view->generate("add-product-view.php", "template-view.php");
    }

    public function addProduct() {
        $notValid = [];
        if (strlen($_POST['name']) > self::NAME_MAX_LEN) {
            $notValid += ["nameErr" => "Product name is too long"];
        }
        if (!preg_match('/[0-9]/', $_POST['price'])) {
            $notValid += ["priceErr" => "Price must contain only digits"];
        }
        if (intval($_POST['price']) <= 0 || intval($_POST['price']) > self::MAX_PRICE) {
            $notValid += ["priceErr" => "Wrong price"];
        }
        if (!preg_match('/[0-9]/', $_POST['price'])) {
            $notValid += ["barcodeErr" => "Barcode must contain only digits"];
        }
        if (strlen($_POST['barcode']) != self::BARCODE_LEN) {
            $notValid += ["barcodeErr" => "Barcode must contain ten digits only"];
        }
        if (strlen($_POST['description']) > self::DESCRIPTION_MAX_LEN) {
            $notValid += ["descriptionErr" => "Description is too long"];
        }

        if (empty($notValid)) {
            extract($_POST);
            $this->model->newProduct($name, $price, $barcode, $description);
        } else {
            $notValid += $_POST;
        }

        $this->view->generate("add-product-view.php", "template-view.php", $notValid);
    }
}
