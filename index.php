<?php
session_start();

require_once ("vendor/autoload.php");

use \Slim\Slim;
use \Colegiada\Page;

$app = new Slim();

$app->config('debug', true);

require_once ("login.php");
require_once ("admin-users.php");
require_once ("admin-categories.php");

$app->run();


 ?>