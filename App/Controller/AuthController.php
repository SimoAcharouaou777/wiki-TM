<?php
namespace App\Controller;
include __DIR__.'../../vendor/autoload.php';
use App\Connection\Connect;
use PDO;

class AuthController
{
    public function Register()
    {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
    
        $password = password_hash($password,PASSWORD_DEFAULT);
        $objuser= new User($id,$username,$email,$password);
        $objuser->createUser();
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['password']= $password;
      
        header('location:../login');  
    }


    public function login()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            echo"von avez pas enregistrer le nom et prenom";
        }else {
            $obj= new User(null,null,null,$email,$password,null,null);
            $data=$obj->getUserByUsername();
           

        }
        
            if (empty($data)) {
                echo"email not on data base";
            }elseif(password_verify($password,$data->password)){
                
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $data->role_name;
                $_SESSION['id'] = $data->id;
                if ($data->role_name=='admin') {
                    echo"admin";
                    
                    }elseif($data->role_name=='user'){
                    echo"user";
                        header('location: client/landing');
                    }elseif($data->role_name=='seller'){
                    echo"seller";
                     header('location:../Profile');
                }   
            }
      }


    public static function AllUsers()
    {
        $allUsers = new User(null,null, null, null,null , null , null);
        return   $allUsers->getAllUsers();
       
    }
    public static function updateUser(){
        
        $id = $_POST['id'];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST['phone'];
        $profile = $_POST['profile'];
        $emailHiden = $_POST['emailHiden'];
        
        User::updateUser($id, $firstname, $lastname, $email, $password, $phone, $profile,$emailHiden);
        header('location:../../Profile');
    }
   
      
       
    
    public  function showUserByEmail(){
        $email = $_SESSION['email'];
        $userModel = new User(null , null , null , $email , null , null, null );
        $user = $userModel->getUserByEmail($email)[0];
        include '../../views/client/sellerProfileEdit.php';
    }
    public  function deleteUser(){
        $id = $_GET["id"]; 
         $user = new User($id, null, null, null, null, null, null);
         $user->delete();
         header('location:../users');
     }




}
