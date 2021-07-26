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
        $this->modelReviews->publishReview((int)$_GET['id']);

        $notPublishedReviews = $this->modelReviews->getNotPublishedReviews(self::REVIEWS_SHOW_LIMIT);
        $this->view->generate("admin-view.php", "template-view.php", $notPublishedReviews);
    }

    public function deleteReview() {
        $this->modelReviews->deleteReview((int)$_GET['id']);

        $notPublishedReviews = $this->modelReviews->getNotPublishedReviews(self::REVIEWS_SHOW_LIMIT);
        $this->view->generate("admin-view.php", "template-view.php", $notPublishedReviews);
    }

    public function createTables() {
        $this->modelProducts->createTable();
        $this->modelReviews->createTable();

        $notPublishedReviews = $this->modelReviews->getNotPublishedReviews(self::REVIEWS_SHOW_LIMIT);
        $this->view->generate("admin-view.php", "template-view.php", $notPublishedReviews);
    }
}
