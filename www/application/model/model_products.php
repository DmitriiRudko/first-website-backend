<?php

require_once("Database.php");

class ModelProducts extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function range_of_products($start_id = 0, $how_many = 0) {
        $data = $this->db->range_of_products($start_id, $how_many);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        return $data;
    }

    public function count_products() {
        $count = $this->db->count_products();
        return $count;
    }

}
