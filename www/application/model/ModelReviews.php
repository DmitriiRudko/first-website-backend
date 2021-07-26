<?php

namespace Application\Model;
require_once("Database.php");
require_once(dirname(__FILE__) . "/../core/Model.php");

use Application\Core\Model;

class ModelReviews extends Model {
    public function getProductReviews($productId) {
        $sql = "SELECT * FROM reviews WHERE product_id = :id and moderated = 1";
        $params = [
            'id' => (int)$productId,
        ];
        $data = $this->db->getOne($sql, $params);
        return $data;
    }

    public function getNotPublishedReviews($limit) {
        $sql = "SELECT * FROM reviews WHERE moderated = 0 LIMIT 0, :limit";
        $params = [
            'limit' => $limit,
        ];
        $data = $this->db->getMany($sql, $params);
        return $data;
    }

    public function addReview($productId, $username, $reviewText) {
        $sql = "INSERT INTO reviews (product_id, user_name, text)  
            VALUES (:productId, :userName, :text)";
        $params = [
            'productId' => $productId,
            'userName' => $username,
            'text' => $reviewText,
        ];
        $this->db->produceStatement($sql, $params);
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
        $this->db->produceStatement($sql);
    }

    public function moderateReview($id, $decision) {
        switch ($decision) {
            case 'publish':
                $sql = "UPDATE reviews SET moderated = 1 WHERE review_id = :id";
                break;
            case 'delete':
                $sql = "DELETE FROM reviews WHERE review_id = :id";
                break;
        }
        $params = [
            'id' => $id,
        ];
        $this->db->produceStatement($sql, $params);
    }
}
