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

    public function getReviews($sql, $productId) {
        $stm = $this->db->prepare($sql);
        $stm->execute([
            'id' => $productId,
        ]);
        $amount = $stm->fetchAll();
        return $amount;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}