<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Category;
use PDO;

class ManageCateController{

    public function index(){
        $category = new Category();
        $cate = $category->getCategories();
        include 'Views/admin/categories.php';
    
    }

}