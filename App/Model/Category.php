<?php
namespace App\Model;
include __DIR__ . '/../../vendor/autoload.php';
use App\Connection\Connection;
use PDO;
class Category
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

    public  function creatCategory($name){
        $sql="INSERT INTO categories (name)
        value(:name)";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->execute();  
    }
    public  function updateCategory($id,$name){
        $sql="UPDATE categories SET name = :name
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM categories WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT * FROM  categories");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getCategoryById($id){

        $sql = "SELECT * FROM categories where id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id , PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
