<?php

use components\Router;
use controllers\ParamsOfProductsController;
use controllers\ProductController;
use models\Book;

ini_set('display_errors',1);
error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';

$router = new Router;

$router->run();
