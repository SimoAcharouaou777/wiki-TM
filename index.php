<?php
// echo"<pre>";
// var_dump($_SERVER);
// echo"</pre>";

// die();
require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/");
$dotenv->load();

// print_r($_ENV);
$router = require 'App\Router/index.php';