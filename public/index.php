<?php


use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

### Initialization
/*
$container = new DI\Container();
*/
$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__). '/.env');


### Run
$app = require_once(__DIR__ . '/../bootstrap/app.php');
$app->run();
