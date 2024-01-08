<?php


use App\Controller\AuthController;
use App\Router;

$router = new Router();
$url = "/WIKI";
$router->get($url.'/', HomeController::class, 'index');
$router->get($url.'/Registre', AuthController::class, 'getPage');
$router->post($url.'/register',AuthController::class,'Register');
$router->get($url.'/Login', AuthController::class, 'getloginpage');
$router->post($url.'/login',AuthController::class,'login');
$router->dispatch();