<?php

namespace Application\Model;
require_once("connection-settings.php");

use Exception, PDO;


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

    public function getOne($sql, $params = []) {
        $stm = $this->db->prepare($sql);
        $stm->execute($params);
        $data = $stm->fetch();
        return $data;
    }

    public function getMany($sql, $params = []) {
        $stm = $this->db->prepare($sql);
        $stm->execute($params);
        $data = $stm->fetchAll();
        return $data;
    }

    public function produceStatement($sql, $params = []) {
        $stm = $this->db->prepare($sql);
        $stm->execute($params);
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}