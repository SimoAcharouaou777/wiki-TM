<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Tags;
use PDO;

class ManageTagsController{

    public function index(){
        $tag = new Tags();
        $tags = $tag->getTags();
        include 'Views/admin/Tags.php';
    
    }
    public function UpdateTag()
    {
        $id = $_GET['id'];
        $tag = new Tags();
        $tags = $tag->getTagsById($id);
        include('Views/admin/UpdateTag.php');
    }
    public function TagUpdate()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $tag = new Tags();
        $tag->updateTags($id , $name);
        header('location:/WIKI/Dashboard');
    }
    public function DeleteTag()
    {
        $id = $_GET['id'];
        $tag = new Tags();
        $tag->deleteTags($id);
        header('location:/WIKI/Dashboard');
    }

}