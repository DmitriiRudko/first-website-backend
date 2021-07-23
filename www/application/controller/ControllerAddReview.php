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
        if (!preg_match('/[0-9]/', $_POST['id'])) {
            if ($this->modelProducts->oneProduct($_POST['id'])){
                //$this->modelReviews-> //НАПИСАТЬ ЗАПРОС К БД НА ДОБАВЛЕНИЕ ОТЗЫВА
            }
        }
        $this->view->generate("add-review-view.php", "template-view.php");
    }
}
