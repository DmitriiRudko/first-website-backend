<?php

require_once("Database.php");

class ModelProducts extends Model {

    public function rangeOfProducts($startId = 0, $howMany = 0, $sortKey = "price", $sortDirection = "desc") {
        if ($sortKey != "reviews") {
            $sql = "SELECT * FROM products ORDER BY " . $sortKey . " " . $sortDirection . " LIMIT :startId, :howMany";
            $data = $this->db->rangeOfProducts($startId, $howMany, $sql);

        } else {
            $sql = "SELECT *, count(reviews.review_id) as cnt FROM products 
                LEFT JOIN reviews ON products.product_id = reviews.product_id  
                GROUP BY products.product_id
                ORDER BY cnt DESC LIMIT :startId, :howMany";
            $data = $this->db->mostCommentedProducts($startId, $howMany, $sql);

        }
        return $data;
    }

    public function oneProduct($id) {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $data = $this->db->oneProduct((int)$id, $sql);
        return $data;
    }

    public function countProducts() {
        $sql = 'SELECT count(*) FROM `products`';
        $count = $this->db->countProducts($sql);
        return $count;
    }

}
