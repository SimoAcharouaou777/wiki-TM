<?php
namespace App\Model;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use PDO;

class Wikies
{
    private $db;
    private $id;
    private $title;
    private $content;
    private $author;
    private $archived;

    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getArchive()
    {
        return $this->archived;
    }

    public function __construct($id = null, $title = null , $content = null, $author = null ,  $archived = false)
    {
        $this->db = Connection::getConnect();
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->archived = $archived;
    }
    public  function createWiki($userId){
        $sql="INSERT INTO wikies (title , content , author , user_id )
        value(:title , :content , :author , :user_id)";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':title',$this->title,PDO::PARAM_STR);
        $stmt->bindParam(':content',$this->content,PDO::PARAM_STR);
        $stmt->bindParam(':author',$this->author,PDO::PARAM_STR);
        $stmt->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $stmt->execute(); 
        $lastInsertedId = $this->db->lastInsertId();
        $sqltagwiki = "INSERT INTO tag_wiki (wiki_id)
        value(:id)";
        $stmtwiki = $this->db->prepare($sqltagwiki);
        $stmtwiki->bindParam(':id' , $lastInsertedId , PDO::PARAM_INT);
        $stmtwiki->execute();
    }
    public static function updateWiki(){
        $sql="UPDATE wikies SET title = :title , content = :content ,
         author = :author 
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $this->title);
        $stmt->bindValue(':content', $this->content);
        $stmt->bindValue(':author', $this->author);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    public function deleteWiki($id){
        $sql = "DELETE FROM wikies WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function getWiki()
    {
        $stmt = $this->db->prepare("SELECT * from  wikies");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getWikiById($id){

        $sql = "SELECT * from wikies where id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}