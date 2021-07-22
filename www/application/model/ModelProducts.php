<?php

require_once("Database.php");

class ModelProducts extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function rangeOfProducts($startId = 0, $howMany = 0, $sortType = null) {
        switch ($sortType) {
            case "priceLTH":
                $key = 'price';
                $direction = "ASC";
                break;
            case "priceHTL":
                $key = 'price';
                $direction = "DESC";
                break;
            case "nameATZ":
                $key = 'name';
                $direction = "ASC";
                break;
            case "nameZTA":
                $key = 'name';
                $direction = "DESC";
                break;
            case "reviews":
                $data = $this->db->mostCommentedProducts($startId, $howMany);
                return $data;
            default:
                $key = 'price';
                $direction = "ASC";
        }
        $data = $this->db->rangeOfProducts($startId, $howMany, $key, $direction);
        return $data;
    }

    public function countProducts() {
        $count = $this->db->countProducts();
        return $count;
    }

}
