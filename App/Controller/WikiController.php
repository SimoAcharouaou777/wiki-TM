<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies; 
use App\Model\Tags;
use App\Model\Category;
use PDO;
session_start();

class WikiController{
    public function creatWiki()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['username'];
        $userId = $_SESSION['id'];
        $categoryId = $_POST['category_id'];
        $tags = $_POST['tags'];
        // var_dump($tags);
        // die();
        $wiki = new Wikies(null,$title , $content , $author ,null , $userId , $categoryId);
        $wiki->createWiki($userId,$categoryId,$tags);

        // if(wiki created){
        //     $wiki->attachTags($tags);
        // }
        header('location:/WIKI/Home');
    }
    public function showWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wikies();
        $wikies = $wiki->displayForUpdate($id);
        $category = new Category();
        $cate = $category->getCategories();
        $tags = new Tags();
        $tag = $tags->getTags();
        include 'Views/client/UpdateWiki.php';
    }
    public function updateWiki(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $tag = $_POST['tags'];
        $category = $_POST['category_id'];
        $wiki = new Wikies();
        $wiki->updateWiki($id , $title , $content );
        header('location:/WIKI/MyWikies');
    }
    public function index()
    {
        $wiki = new Wikies();
        $wikies = $wiki->getAcceptedWiki();
        $category = new Category();
        $cate = $category->getCategories();
        include 'Views/client/OurWikies.php';
    }
    public function search()
    {

        $wiki = new Wikies();
        $wikies = $wiki->searchWiki($_GET['id']);
        $category = new Category();
        $cate = $category->getCategories();
        include 'Views/client/search.php';
    }
}