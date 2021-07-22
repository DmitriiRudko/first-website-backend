<?php

ini_set('display_errors', 1);
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR);

require_once('application/core/Route.php');
require_once('application/core/Model.php');
require_once('application/core/View.php');
require_once('application/core/Controller.php');

Route::start();