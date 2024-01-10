<?php
namespace App\Model;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use PDO;

class Tags
{
    private $db;
    private $id;
    private $name;

    public function getName(){
        return $this->name;
    }

    public function __construct($id=null, $name=null){
        $this->db = Connection::getConnect();
        $this->id = $id;
        $this->name = $name;
    }
    public  function createTags(){
        $sql="INSERT INTO tags (name)
        value(:name)";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->execute();  
    }
    public  function updateTags(){
        $sql="UPDATE tags SET name = :name
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    public function deleteTags($id){
        $sql = "DELETE FROM tags WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function getTags()
    {
        $stmt = $this->db->prepare("SELECT * from  tags");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getTagsById($id){

        $sql = "SELECT * from tags where id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}