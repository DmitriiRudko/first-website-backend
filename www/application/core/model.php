<?php

class Model {
    protected $db;

    protected function __construct() {
        $this->db = Database::get_instance();
    }
}
