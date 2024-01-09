<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use App\Model\Wikies;
use PDO;

class HomeController{

    public function index(){
        $wiki = new Wikies();
        $wikies = $wiki->getWiki();
        include 'Views/client/home.php';
    
    }

}