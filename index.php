<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

session_start();

require_once './classes/view.php';
require_once './classes/route.php';
require_once './helpers/setRoutes.php';

Route::run();