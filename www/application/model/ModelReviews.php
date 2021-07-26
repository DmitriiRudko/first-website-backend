<?php

require_once("Database.php");

class ModelReviews extends Model {
    public function getProductReviews($productId) {
        $sql = "SELECT * FROM reviews WHERE product_id = :id and moderated = 1";
        $data = $this->db->getProductReviews($sql, $productId);
        return $data;
    }

    public function getNotPublishedReviews($limit) {
        $sql = "SELECT * FROM reviews WHERE moderated = 0 LIMIT 0, :limit";
        $data = $this->db->getNotPublishedReviews($sql, $limit);
        return $data;
    }

    public function deleteReview($id) {
        $sql = "DELETE FROM reviews WHERE review_id = :id";
        $this->db->deleteReview($sql, $id);
    }

    public function publishReview($id) {
        $sql = "UPDATE reviews SET moderated = 1 WHERE review_id = :id";
        $this->db->publishReview($sql, $id);
    }

    public function addReview($productId, $username, $reviewText) {
        $sql = "INSERT INTO reviews (product_id, user_name, text)  
            VALUES (:productId, :userName, :text)";
        $this->db->addReview($sql, $productId, $username, $reviewText);
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `reviews` (
                `review_id` int(11) NOT NULL AUTO_INCREMENT,
                `product_id` int(11) NOT NULL,
                `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                `text` longtext COLLATE utf8_unicode_ci NOT NULL,
                `moderated` tinyint(4) DEFAULT '0',
                PRIMARY KEY (`review_id`),
                KEY `fk_reviews_products_idx` (`product_id`),
                CONSTRAINT `fk_reviews_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->createReviewTable($sql);
    }
}
