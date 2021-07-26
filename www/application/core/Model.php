<?php

namespace Application\Core;
use Application\Model\Database;

class Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
}
