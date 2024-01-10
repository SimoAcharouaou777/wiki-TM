<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies;
use App\Model\Category;
use PDO;

class DashboardController{
    public function showdashboard(){
        $cate = new Category();
        $Category = $cate->getCategories();
        $wiki = new Wikies();
        $wikies = $wiki->getWiki();
       include 'Views/admin/dashboard.php';
     
    }
}