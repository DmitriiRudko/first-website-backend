<?php

require_once("connection-settings.php.example");

class Database {
    protected $db;

    protected static $instance;

    private function __construct() {
        try {
            $this->db = new PDO(DNS, USER, PASSWD, OPT);
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function rangeOfProducts($startId, $howMany, $sql) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'startId' => $startId,
            'howMany' => $howMany,
        ]);
        $data = $stm->fetchAll();
        return $data;
    }

    public function mostCommentedProducts($startId, $howMany, $sql) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'startId' => $startId,
            'howMany' => $howMany,
        ]);

        $data = $stm->fetchAll();
        return $data;
    }

    public function oneProduct($id, $sql) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'id' => $id,
        ]);
        $data = $stm->fetch();
        return $data;
    }

    public function countProducts($sql) {
        $stm = $this->db->query($sql);
        $amount = $stm->fetchColumn();
        return $amount;
    }

    public function getProductReviews($sql, $productId) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'id' => $productId,
        ]);
        $reviews = $stm->fetchAll();
        return $reviews;
    }

    public function getNotPublishedReviews($sql, $limit) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'limit' => $limit,
        ]);
        $reviews = $stm->fetchAll();
        return $reviews;
    }

    public function newProduct($sql, $name, $price, $barcode, $description) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'name' => $name,
            'price' => $price,
            'barcode' => $barcode,
            'description' => $description
        ]);
    }

    public function addReview($sql, $productId, $username, $reviewText) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'productId' => $productId,
            'userName' => $username,
            'text' => $reviewText,
        ]);
    }

    public function deleteReview($sql, $id){
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'id' => $id,
        ]);
    }

    public function publishReview($sql, $id){
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'id' => $id,
        ]);
    }

    public function createProductTable($sql){
        $stm = $this->db->prepare($sql);
        $stm->execute();
    }

    public function createReviewTable($sql){
        $stm = $this->db->prepare($sql);
        $stm->execute();
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}