<?php
namespace App\Model;
include __DIR__.'/../../vendor/autoload.php';
use App\Coneection\Connect;
use PDO;

class User
{

    private $db;
    private $id;
    private $username;
    private $email;
    private $password;


    public function getUserName()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }


    public function __construct($id=null, $username=null, $email=null, $password=null)
    {
        $this->db = Connect::getInstence()->getConnect();
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public static function getUserById($id)
    {
        $sql = "SELECT users.*, roles.name as role FROM users
        LEFT JOIN roles ON users.role_id = roles.id
        WHERE users.id = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);
        if ($statement) {
            $statement->execute();
            $resultInstances = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $resultInstances;
            } else {
                return null;
            }
    }

    public static function getAllUsers(){
        $sql = "SELECT users.* , roles.name as role FROM users
        LEFT JOIN roles ON users.role_id = roles.id";
        $stmt = $this->db->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else{
            return null;
        }
        
    }
    public static function createUser(){
        $sql ="INSERT INTO users (username , email , password) 
        values(:username , :email , :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':password',$password,PDO::PARAM_STR);
        $stmt->execute();
    }
}