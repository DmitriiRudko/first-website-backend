<?php

require_once("Database.php");

class ModelProducts extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function rangeOfProducts($startId = 0, $howMany = 0) {
        $data = $this->db->rangeOfProducts($startId, $howMany);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        return $data;
    }

    public function countProducts() {
        $count = $this->db->countProducts();
        return $count;
    }

}
