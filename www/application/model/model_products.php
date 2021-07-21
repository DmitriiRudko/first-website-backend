<?php
require_once("connection_settings.php");

class ModelProducts extends Model
{

    private static $instance;

    private function __construct()
    {
        try {
            //  $this->pdo = new PDO(DNS, USER, PASSWD, OPT);
        } catch (Exception $ex) {
            echo 'Caught exception: ', $ex->getMessage(), "\n";
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function get_data()
    {
        $data = $this->pdo->query("SELECT * FROM products")->fetchAll('PDO::FETCH_UNIQUE');
        return;
    }
}

?>