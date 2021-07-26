<?php

namespace Application\Controller;
require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../model/ModelReviews.php");
require_once(dirname(__FILE__) . "/../core/Controller.php");

use Application\Core\Controller;
use Application\Model\ModelProducts;
use Application\Model\ModelReviews;


class ControllerAddReview extends Controller {
    private const NAME_MAX_LEN = 30;

    private const REVIEW_MAX_LEN = 250;

    private $modelProducts;

    private $modelReviews;

    public function __construct() {
        parent::__construct();
        $this->modelProducts = new ModelProducts();
        $this->modelReviews = new ModelReviews();
    }

    public function newReviewPage() {
        $this->view->generate("add-review-view.php");
    }

    public function addReview() {
        if ($this->modelProducts->oneProduct((int)$_POST['id'])) {
            $this->modelReviews->addReview(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['username']), htmlspecialchars($_POST['reviewText']));
            $product = $this->modelProducts->oneProduct((int)$_POST['id']);
            $this->view->generate("one-product-view.php", $product);
        }
    }
}
