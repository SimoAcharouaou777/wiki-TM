<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies;
use PDO;

class ManageWikiesController{

    public function index()
    {
        $wiki = new Wikies();
        $wikies = $wiki->getWiki();
        include 'Views/admin/Wikies.php';
    
    }
    public function acceptWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wikies();
        $wiki->acceptWiki($id);
        header('location:/WIKI/ManageWikies');
    }

    public function archiveWiki()
    {
        $id = $_GET['id'];
        $wiki = new Wikies();
        $wiki->archiveWiki($id);
        header('location:/WIKI/ManageWikies');
    }
}