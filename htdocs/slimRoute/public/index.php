<?php
use Slim\Factory\AppFactory;

require_once($_SERVER["DOCUMENT_ROOT"]."/slimRoute/vendor/autoload.php");

$app = AppFactory::create();

require_once($_SERVER["DOCUMENT_ROOT"]."/slimRoute/routes.php");

$app->run();