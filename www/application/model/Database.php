<?php

require_once("ConnectionSettings.php");

class Database {
    protected $db;

    protected static $instance;

    private function __construct() {
        try {
           // $this->db = new PDO(DNS, USER, PASSWD, OPT);
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

    public function rangeOfProducts($startId, $howMany) {
        $stm = $this->db->prepare('SELECT * FROM `products` LIMIT :$startId, :$howMany');
        $stm->execute(array('start_id' => $startId, 'how_many' => $howMany));
        $data = $stm->fetchAll();
        return $data;
        //return [1 => ["name" => "qerqer", "barcode" => 123]];
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