<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use App\Model\User; 
use PDO;
session_start();
class AuthController
{
    public function Register()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $user =  new User();
        $result =  $user->getAllUsers();
        foreach($result as $user){
            if($user['username'] === $username){
                echo"Pleas Chose Another username";
                return;
            }
            if($user['email'] === $email){
                echo"  chose another email";
                return;
            }
        }
        $objuser= new User($username,$email,$password);
        $objuser->createUser();

      
        header('location:../WIKI/Login');
    }


    public function login()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email) || empty($password)){
            echo"All the fields are required";
        }else {
            $obj= new User($email,$password);
            $data=$obj->getUserByEmail($email);
        }
        
            if (empty($data)) {
                echo"wrong password or email";
            }elseif(password_verify($password,$data[0]['password'])){
                
                $_SESSION['role'] = $data[0]['role'];
                $_SESSION['id'] = $data[0]['id'];
                $_SESSION['username'] = $data[0]['username'];
                // var_dump($_SESSION);
                // die();
                if ($data[0]['role']=='admin') {
                    echo"admin";
                }else{
                    echo"user";
                    header('location:../WIKI/Home');
                    }  
            }else{
                echo"invalid password or email";
            }
      }


   
   
      
       
    


     public function getPage(){
        include "Views/auth/signup.php";
     }
     public function getloginpage(){
        include "Views/auth/login.php";
     }
    


}
