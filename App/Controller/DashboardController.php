<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use App\Model\Category;
use PDO;

class DashboardController{
    public function showdashboard(){
        $cate = new Category;
        $Category = $cate->getCategories();
       include 'Views/admin/dashboard.php';
     
    }
}