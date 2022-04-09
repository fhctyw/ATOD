<?php

//Composer
require_once dirname(__DIR__) . '\\vendor\\autoload.php';

error_reporting(E_ALL);

$router = new Core\Router();


$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);