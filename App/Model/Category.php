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

    public  function creatCategory(){
        $sql="INSERT INTO categories (name)
        value(:name)";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->execute();  
    }
    public  function updateCategory(){
        $sql="UPDATE categories SET name = :name
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM categories WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT * from  categories");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getCategoryById($id){

        $sql = "SELECT * from categories where id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}
