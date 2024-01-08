<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connect;
use App\Model\User; 
use PDO;

class AuthController
{
    public function Register()
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $objuser= new User($username,$email,$password);
        $objuser->createUser();

      
        // header('location:../login');  
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
                echo"User Not Found";
            }elseif(password_verify($password,$data[0]['password'])){
                
                $_SESSION['role'] = $data[0]['role'];
                $_SESSION['id'] = $data[0]['id'];
                if ($data[0]['role']=='admin') {
                    echo"admin";
                }else{
                    echo"user";
                    }  
            }
      }


   
   
      
       
    


     public function getPage(){
        include "Views/auth/signup.php";
     }
     public function getloginpage(){
        include "Views/auth/login.php";
     }
    


}
