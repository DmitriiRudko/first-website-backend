<?php

namespace Application\Controller;
require_once(dirname(__FILE__) . "/../model/ModelProducts.php");
require_once(dirname(__FILE__) . "/../model/ModelReviews.php");
require_once(dirname(__FILE__) . "/../core/Controller.php");

use Application\Core\Controller;
use Application\Model\ModelProducts;
use Application\Model\ModelReviews;

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
        $this->view->generate("admin-view.php", $notPublishedReviews);
    }

    public function publishReview() {
        $this->modelReviews->moderateReview((int)$_GET['id'], 'publish');
        $this->adminPage();
    }

    public function deleteReview() {
        $this->modelReviews->moderateReview((int)$_GET['id'], 'delete');
        $this->adminPage();
    }

    public function createTables() {
        $this->modelProducts->createTable();
        $this->modelReviews->createTable();
        $this->adminPage();
    }
}
