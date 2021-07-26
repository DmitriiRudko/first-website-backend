<?php

require_once("Database.php");

class ModelReviews extends Model {
    public function getProductReviews($productId) {
        $sql = "SELECT * FROM reviews WHERE product_id = :id";
        $data = $this->db->getProductReviews($sql, $productId);
        return $data;
    }

    public function getNotPublishedReviews($limit) {
        $sql = "SELECT * FROM reviews WHERE moderated = 0 LIMIT 0, :limit";
        $data = $this->db->getNotPublishedReviews($sql, $limit);
        return $data;
    }

    public function addReview($productId, $username, $reviewText) {
        $sql = "INSERT INTO reviews (product_id, user_name, text)  
            VALUES (:productId, :userName, :text)";
        $this->db->addReview($sql, $productId, $username, $reviewText);
    }
}
