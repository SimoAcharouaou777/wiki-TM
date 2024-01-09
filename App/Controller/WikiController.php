<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use App\Model\Wikies; 
use PDO;
session_start();

class WikiController{
    public function creatWiki()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $userId = $_SESSION['id'];
        $wiki = new Wikies(null,$title , $content , $author ,null , $userId );
        
        $wiki->createWiki($userId);
    }
    public function showWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wikies();
        $wikies = $wiki->getWikiById($id);
        include 'Views/client/UpdateWiki.php';
    }
    public function updateWiki(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $wiki = new Wikies();
        $wiki->updateWiki($id , $title , $content , $author);
        header('location:/WIKI/Dashboard');
    }
    
}