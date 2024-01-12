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
    public  function createWiki($userId,$categoryId,$tags){
        $sql="INSERT INTO wikies (title , content , author , user_id , category_id )
        value(:title , :content , :author , :user_id , :category_id)";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':title',$this->title,PDO::PARAM_STR);
        $stmt->bindParam(':content',$this->content,PDO::PARAM_STR);
        $stmt->bindParam(':author',$this->author,PDO::PARAM_STR);
        $stmt->bindParam(':user_id',$userId,PDO::PARAM_INT);
        $stmt->bindParam(':category_id',$categoryId,PDO::PARAM_INT);
        $stmt->execute(); 
        $lastInsertedId = $this->db->lastInsertId();
        $sqltagwiki = "INSERT INTO tag_wiki (wiki_id , tag_id)
        value(:wiki_id , :tag_id)";
        $stmtwiki = $this->db->prepare($sqltagwiki);
        foreach($tags as $tagId){
            $stmtwiki->bindParam(':wiki_id' , $lastInsertedId , PDO::PARAM_INT);
            $stmtwiki->bindParam(':tag_id' , $tags , PDO::PARAM_INT);
            $stmtwiki->execute();
        }
       
    }
    public  function updateWiki($id, $title , $content ){
        $sql="UPDATE wikies SET title = :title , content = :content  
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id);
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
        $stmt = $this->db->prepare("SELECT * FROM  wikies");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getWikiById($id){

        $sql = "SELECT * FROM wikies WHERE id =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    public function getAcceptedWiki(){
        $sql="SELECT wikies.*, categories.name AS category, GROUP_CONCAT(tags.name) AS tags
        FROM wikies
        INNER JOIN categories ON wikies.category_id = categories.id
        INNER JOIN tag_wiki ON wikies.id = tag_wiki.wiki_id
        INNER JOIN tags ON tag_wiki.tag_id = tags.id
        WHERE archived = 'accepted'
        GROUP BY wikies.id";
        $stmt = $this->db->prepare($sql) ;
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
        
    }
    public function acceptWiki($id){
        $sql="UPDATE wikies SET archived = :archived
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $archivedValue = 'accepted';
        $stmt->bindParam(':archived',$archivedValue);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
    public function archiveWiki($id){
        $sql="UPDATE wikies SET archived = :archived
        WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $archivedValue = 'refused';
        $stmt->bindParam(':archived',$archivedValue);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
    public function getLastWiki(){
        $sql="SELECT *  FROM wikies
        WHERE archived = 'accepted'
        ORDER BY id LIMIT 2 ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function displayWikies()
    {
        $sql="SELECT wikies.*, categories.name AS category, GROUP_CONCAT(tags.name) AS tags
        FROM wikies
        INNER JOIN categories ON wikies.category_id = categories.id
        INNER JOIN tag_wiki ON wikies.id = tag_wiki.wiki_id
        INNER JOIN tags ON tag_wiki.tag_id = tags.id
        GROUP BY wikies.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function searchWiki($value)
    {
        $sql="SELECT wikies.*, categories.name AS category, GROUP_CONCAT(tags.name) AS tags
        FROM wikies
        INNER JOIN categories ON wikies.category_id = categories.id
        INNER JOIN tag_wiki ON wikies.id = tag_wiki.wiki_id
        INNER JOIN tags ON tag_wiki.tag_id = tags.id
        WHERE title like ? 
        GROUP BY wikies.id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["%$value%"]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function displayUserWiki($id)
    {
        $sql="SELECT wikies.*, categories.name AS category, GROUP_CONCAT(tags.name) AS tags
        FROM wikies
          JOIN categories ON wikies.category_id = categories.id
          JOIN tag_wiki ON wikies.id = tag_wiki.wiki_id
          JOIN tags ON tag_wiki.tag_id = tags.id
          JOIN users ON wikies.user_id = users.id
        WHERE users.id = :id
        GROUP BY wikies.id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function displayForUpdate($id)
    {
        $sql="SELECT wikies.*, categories.name AS category, GROUP_CONCAT(tags.name) AS tags
        FROM wikies
          JOIN categories ON wikies.category_id = categories.id
          JOIN tag_wiki ON wikies.id = tag_wiki.wiki_id
          JOIN tags ON tag_wiki.tag_id = tags.id
        WHERE wikies.id = :id
        GROUP BY wikies.id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':id',$id,PDO::PARAM_INT);
         $stmt->execute();
         $row = $stmt->fetchAll(PDO::FETCH_OBJ);
         return $row;
    }
   
}