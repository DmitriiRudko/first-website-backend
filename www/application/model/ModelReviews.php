<?php

require_once("Database.php");

class ModelReviews extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getReviewsByProductId($id) {
        $data = $this->db->oneProduct((int)$id);
    }

    public function oneProduct($id) {
        $data = $this->db->oneProduct((int)$id);
        return $data;
    }

    public function countProducts() {
        $count = $this->db->countProducts();
        return $count;
    }

}
