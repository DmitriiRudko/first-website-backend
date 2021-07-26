<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../model/ModelReviews.php");

class ControllerAdmin extends Controller {
    private $modelProducts;

    private $modelReviews;

    private const REVIEWS_SHOW_LIMIT = 10;

    public function __construct() {
        parent::__construct();
        $this->modelProducts = new ModelProducts();
        $this->modelReviews = new ModelReviews();
    }

    public function adminPage() {
        $notPublishedReviews = $this->modelReviews->getNotPublishedReviews(self::REVIEWS_SHOW_LIMIT);
        $this->view->generate("admin-view.php", "template-view.php", $notPublishedReviews);
    }

    public function publishReview() {

    }

    public function deleteReview() {
        if ($this->modelProducts->oneProduct((int)$_POST['id'])) {
            $this->modelReviews->addReview((int)$_POST['id'], $_POST['username'], $_POST['reviewText']);
            $product = $this->modelProducts->oneProduct((int)$_POST['id']);
            $this->view->generate("one-product-view.php", "template-view.php", $product);
        }
    }
}
