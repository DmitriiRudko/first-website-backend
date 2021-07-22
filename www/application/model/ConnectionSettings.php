<?php

define(HOST, '192.168.0.1');
define(DB, 'tdb_rudko');
define(USER, 'dbu_rudko');
define(PASSWD, '663f052c');
define(CHARSET, 'utf8');

define(DNS, "mysql:host=192.168.0.1;dbname=tdb_rudko;charset=utf8");
define(OPT, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
?>