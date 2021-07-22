<?php

require_once("ConnectionSettings.php");

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

    public function rangeOfProducts($startId, $howMany, $sortKey, $sortDirection) {
        $sql = "SELECT * FROM products ORDER BY " . $sortKey . " " . $sortDirection . " LIMIT :startId, :howMany";
        $stm = $this->db->prepare($sql);
        $stm->execute(array(
            'startId' => $startId,
            'howMany' => $howMany,
        ));

        $data = $stm->fetchAll();
        return $data;
        //return [1 => ["name" => "qerqer", "barcode" => 123]];
    }

    public function mostCommentedProducts($startId, $howMany) {
        $sql = "SELECT *, count(reviews.id) as cnt FROM products 
                LEFT JOIN reviews ON products.id = reviews.product_id  
                GROUP BY products.id
                ORDER BY cnt DESC LIMIT :startId, :howMany";
        $stm = $this->db->prepare($sql);
        $stm->execute(array(
            'startId' => $startId,
            'howMany' => $howMany,
        ));

        $data = $stm->fetchAll();
        return $data;
    }

    public function oneProduct($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stm = $this->db->prepare($sql);
        $stm->execute(array(
            'id' => $id,
        ));
        $data = $stm->fetch();
        return $data;
    }

    public function countProducts() {
        $stm = $this->db->query('SELECT count(*) FROM `products`');
        $amount = $stm->fetchColumn();
        return $amount;
        //return 1;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}