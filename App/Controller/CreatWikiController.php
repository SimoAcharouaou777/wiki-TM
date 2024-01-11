<?php 
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Tags;
use App\Model\Category;
use PDO;

class CreatWikiController
{
    public function index()
    {
        $tags = new Tags();
        $tag = $tags->getTags();
        $category = new Category();
        $cate = $category->getCategories();
        include 'Views/client/CreatWiki.php';
    }
}