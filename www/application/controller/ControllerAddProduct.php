<?php

namespace Application\Controller;
require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../core/Controller.php");

use Application\Core\Controller;
use Application\Model\ModelProducts;

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
        $this->view->generate("add-product-view.php");
    }

    public function addProduct() {
        $notValid = [];
        if (strlen(($_POST['name'])) > self::NAME_MAX_LEN) {
            $notValid = array_merge($notValid, ["nameErr" => "Product name is too long"]);
        }

        if (!is_numeric($_POST['price'])) {
            $notValid = array_merge($notValid, ["priceErr" => "Price must contain only digits"]);
        }
        if ((int)$_POST['price'] <= 0 || (int)$_POST['price'] > self::MAX_PRICE) {
            $notValid = array_merge($notValid, ["priceErr" => "Wrong price"]);
        }
        if (!is_numeric($_POST['barcode'])) {
            $notValid = array_merge($notValid, ["barcodeErr" => "Barcode must contain only digits"]);
        }
        if (strlen($_POST['barcode']) != self::BARCODE_LEN) {
            $notValid = array_merge($notValid, ["barcodeErr" => "Barcode must contain ten digits only"]);
        }
        if (strlen($_POST['description']) > self::DESCRIPTION_MAX_LEN) {
            $notValid = array_merge($notValid, ["descriptionErr" => "Description is too long"]);
        }

        if (empty($notValid)) {
            extract($_POST);
            $this->model->newProduct(htmlspecialchars($name), htmlspecialchars($price), htmlspecialchars($barcode), htmlspecialchars($description));
        } else {
            $notValid += $_POST;
        }

        $this->view->generate("add-product-view.php", $notValid);
    }
}
