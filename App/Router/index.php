<?php


use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\WikiController;
use App\Router;

$router = new Router();
$url = "/WIKI";
$router->get($url.'/', HomeController::class, 'index');
$router->get($url.'/Registr', AuthController::class, 'getPage');
$router->post($url.'/register',AuthController::class,'Register');
$router->get($url.'/Login', AuthController::class, 'getloginpage');
$router->post($url.'/login',AuthController::class,'login');
$router->get($url.'/Home', HomeController::class,'index');
$router->post($url.'/creatWiki',WikiController::class,'creatWiki');
$router->dispatch();