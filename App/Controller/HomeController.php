<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies;
use App\Model\Tags;
use App\Model\Category;
use PDO;

class HomeController{

    public function index(){
        $wiki = new Wikies();
        $wikies = $wiki->getWiki();
        $tags = new Tags();
        $tag = $tags->getTags();
        $category = new Category();
        $cate = $category->getCategories();
        $wikies = new Wikies();
        $wiki = $wikies->getAcceptedWiki();
        include 'Views/client/home.php';
    
    }

}