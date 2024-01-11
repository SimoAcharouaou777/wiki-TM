<?php
namespace App\Connection;
use PDO;
use Dotenv\Dotenv;
require_once __DIR__.'/../../vendor/autoload.php';
$dotenv = Dotenv::CreateImmutable(__DIR__.'/../../');
$dotenv->load();

class Connection {
   
    public static function getConnect(){
        return  new PDO("mysql:host={$_ENV['DB_HOST']};user={$_ENV['DB_USER']};dbname={$_ENV['DB_NAME']}");
    }

}