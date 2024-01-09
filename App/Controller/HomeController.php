<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use PDO;

class HomeController{

    public function index(){
        include 'Views/client/home.php';
    }

}