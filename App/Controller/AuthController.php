<?php
namespace App\Controller;

include __DIR__ . '/../../vendor/autoload.php';
use App\Model\User;

session_start();
class AuthController
{
    public function Register()
    {
        unset($_SESSION['erroruser']);
        unset($_SESSION['erroremail']);
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = new User();
        $result = $user->getAllUsers();
        foreach ($result as $user) {
            if ($user['username'] === $username) {
                $_SESSION['erroruser'] = "Pleas Chose Another username";
                header('location:../WIKI/Registr');
                return;
            }
            if ($user['email'] === $email) {
                $_SESSION['erroremail'] = "chose another email";
                header('location:../WIKI/Registr');
                return;
            }
        }
        $objuser = new User($username, $email, $password);
        $objuser->createUser();

        header('location:/WIKI/Login');
    }

    public function login()
    {
        unset($_SESSION['errorempty']);
        unset($_SESSION['erroremail']);
        unset($_SESSION['invalidpassword']);

        $email = $_POST['email'];
        $password = $_POST['password'];
        if (empty($email) || empty($password)) {
            $_SESSION['errorempty'] = "All the fields are required";
            header('location:/WIKI/Login');
        } else {
            $obj = new User($email, $password);
            $data = $obj->getUserByEmail($email);
        }

        if (empty($data)) {
            $_SESSION['erroremail'] = "wrong password or email";
            header('location:/WIKI/Login');
        } elseif (password_verify($password, $data[0]['password'])) {

            $_SESSION['role'] = $data[0]['role'];
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['username'] = $data[0]['username'];

            if ($data[0]['role'] == 'admin') {
                header('location:/WIKI/Dashboard');
            } else {
                
                header('location:../WIKI/Home');
            }
        } else {
            $_SESSION['invalidpassword'] =  "invalid password or email";
            header('location:/WIKI/Login');
        }
    }
    public function logout()
    {
        session_destroy();
        header('location:/WIKI/Login');
    }

    public function getPage()
    {
        include "Views/auth/signup.php";
    }
    public function getloginpage()
    {
        include "Views/auth/login.php";
    }

}
