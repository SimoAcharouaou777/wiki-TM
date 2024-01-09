<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Category;
use PDO;

class CategoryController{
    public function showpage(){
        include 'Views/admin/CreatCategory.php';
    }

    public function createCategory(){
        $catename = $_POST['name'];
        $category = new Category();
        $result= $category->getCategories();

        if($result->name === $catename){
            echo"chose another category";
        }else{
            $category = new Category();
            $category->creatCategory(null , $catename);
        }
    }
}