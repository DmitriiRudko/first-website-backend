<?php

require_once("connection_settings.php");

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

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function range_of_products($start_id, $how_many) {
        $stm = $this->db->prepare('SELECT * FROM `products` LIMIT :start_id, :how_many');
        $stm->execute(array('start_id' => $start_id, 'how_many' => $how_many));
        $data = $stm->fetchAll();
        return $data;
    }

    public function count_products() {
        $stm = $this->db->query('SELECT count(*) FROM `products`');
        $amount = $stm->fetchColumn();
        return $amount;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}