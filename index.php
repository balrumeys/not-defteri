<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/NotesController.php';
require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/helpers.php';

$app = AppFactory::create();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

require "smarty.php";
include __DIR__ . '/routes.php';


$app->run();
