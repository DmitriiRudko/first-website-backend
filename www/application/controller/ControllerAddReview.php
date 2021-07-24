<?php

require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../model/ModelReviews.php");

class ControllerAddReview extends Controller {
    private const NAME_MAX_LEN = 30;

    private const REVIEW_MAX_LEN = 250;

    public function __construct() {
        parent::__construct();
        $this->modelProducts = new ModelProducts();
        $this->modelReviews = new ModelReviews();
    }

    public function newReviewPage() {
        $this->view->generate("add-review-view.php", "template-view.php");
    }

    public function addReview() {
        if ($this->modelProducts->oneProduct((int)$_POST['id'])) {
            $this->modelReviews->addReview($_POST['id'], $_POST['username'], $_POST['reviewText']);
            $product = $this->modelProducts->oneProduct((int)$_POST['id']);
            $this->view->generate("one-product-view.php", "template-view.php", $product);
        }
    }
}
