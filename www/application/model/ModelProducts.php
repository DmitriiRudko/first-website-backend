<?php

namespace Application\Model;
require_once("Database.php");
require_once(dirname(__FILE__) . "/../core/Model.php");

use Application\Core\Model;

class ModelProducts extends Model {

    public function rangeOfProducts($startId = 0, $howMany = 0, $sortKey = "price", $sortDirection = "desc") {
        $params = [
            'startId' => $startId,
            'howMany' => $howMany,
        ];
        if ($sortKey != "reviews") {
            $sql = "SELECT * FROM products ORDER BY " . $sortKey . " " . $sortDirection . " LIMIT :startId, :howMany";
            $data = $this->db->getMany($sql, $params);
        } else {
            $sql = "SELECT *, count(reviews.review_id) as cnt FROM products 
                LEFT JOIN reviews ON products.product_id = reviews.product_id
                GROUP BY products.product_id
                ORDER BY cnt DESC LIMIT :startId, :howMany";
            $data = $this->db->getMany($sql, $params);
        }
        return $data;
    }

    public function oneProduct($id) {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $params = [
            'id' => (int)$id,
        ];
        $data = $this->db->getOne($sql, $params);
        return $data;
    }

    public function countProducts() {
        $sql = "SELECT count(*) as cnt FROM products";
        $count = $this->db->getOne($sql);
        return $count['cnt'];
    }

    public function newProduct($name, $price, $barcode, $description) {
        $sql = "INSERT INTO products (`name`, `barcode`, `description`, `price`) 
                VALUES (:name, :barcode, :description, :price)";
        $params = [
            'name' => $name,
            'price' => $price,
            'barcode' => $barcode,
            'description' => $description
        ];
        $this->db->produceStatement($sql, $params);
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS `products` (
                `product_id` int(11) NOT NULL AUTO_INCREMENT,
                `name` longtext COLLATE utf8_unicode_ci,
                `barcode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
                `description` longtext COLLATE utf8_unicode_ci,
                `price` int(11) NOT NULL,
                PRIMARY KEY (`product_id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->produceStatement($sql);
    }

}
