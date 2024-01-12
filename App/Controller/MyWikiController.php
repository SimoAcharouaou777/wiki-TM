<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies;
use App\Model\Tags;
use App\Model\Category;
use PDO;
session_start();

class MyWikiController
{
    public function index()
    {
        $id = $_SESSION['id'];
        $wiki = new Wikies();
        $wikies = $wiki->displayUserWiki($id);
        include 'Views/client/MyWiki.php';
    }
    public function deleteWiki(){
        $id = $_GET['id'];
        $wiki = new Wikies();
        $wiki->deleteWiki($id);
        header('location:/WIKI/MyWikies');
    }
}