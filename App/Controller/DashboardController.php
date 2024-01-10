<?php
namespace App\Controller;
include __DIR__.'/../../vendor/autoload.php';
use App\Connection\Connection;
use App\Model\Wikies;
use App\Model\Category;
use App\Model\User;
use PDO;

class DashboardController{
    public function showdashboard(){
        $user = new User();
        $users = $user->getAllUsers();
       include 'Views/admin/dashboard.php';
     
    }
}