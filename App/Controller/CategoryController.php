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
        try {
            $category->creatCategory($catename);
        } catch (\PDOException $e) {
            if ($e->getCode() == '23000' || $e->errorInfo[1] == 1062) {
                echo "Chose another Category , this one already exists.";
            } else {
                echo "PDO Exception: " . $e->getMessage();
            }
        }
      
       
        }
    
    public function showupdatepage(){
        $id = $_GET['id'];
        $category = new Category();
        $cate = $category->getCategoryById($id);
        include 'Views/admin/UpdateCategory.php';
    }
    public function updateCategory(){
        $newcategory = $_POST['name'];
        $id = $_POST['id'];
        $category = new Category();
        $category->updateCategory($id,$newcategory);
        header('location:/WIKI/Dashboard');
    }
    public function deleteCategory(){
        $id = $_GET['id'];
        $category = new Category();
        $category->deleteCategory($id);
        header('location:/WIKI/Dashboard');
    }
}