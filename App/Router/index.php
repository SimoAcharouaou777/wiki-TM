<?php


use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\WikiController;
use App\Controller\DashboardController;
use App\Controller\CategoryController;
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
$router->get($url.'/Dashboard',DashboardController::class,'showdashboard');
$router->get($url.'/CreatCategory',CategoryController::class,'showpage');
$router->post($url.'/CategoryController',CategoryController::class,'createCategory');
$router->get($url.'/Updatecategory',CategoryController::class,'showupdatepage');
$router->post($url.'/UpadateCate',CategoryController::class,'updateCategory');
$router->get($url.'/deletecategory',CategoryController::class,'deleteCategory');
$router->dispatch();