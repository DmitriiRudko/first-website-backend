<?php

require_once("Database.php");

class ModelReviews extends Model {
    public function getReviews($productId) {
        $sql = "SELECT * FROM reviews WHERE product_id = :id";
        $data = $this->db->getReviews($sql, $productId);
        print_r($data);
        return $data;
    }
}
