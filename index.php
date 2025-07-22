<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

include __DIR__ . '/routes.php';

$app->run();
