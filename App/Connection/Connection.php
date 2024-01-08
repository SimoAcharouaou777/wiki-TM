<?php
namespace App\Connection;
use PDO;
use Dotenv\Dotenv;
require_once __DIR__.'/../../vendor/autoload.php';
$dotenv = Dotenv::CreateImmutable(__DIR__.'/../../');
$dotenv->load();

class Connect {
    private static $instance;
    private $connection;
    public static $count = 0;

    private function __construct(){
        $servername = $_ENV['DB_HOST'];
        $username = $_ENV['DB_NAME'];
        $password = $_ENV['DB_PASSWORD'];
        $dbname = $_ENV['DB_NAME'];
        $this->connection = new PDO("mysql:host= $servername;dbname=$dbname ;$username , $password");

        if(!$this->connection){
            die("connection failed".mysqli_connect_error());
        }else{
            echo"connected successfully";
        }
    }
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Connect();
        }
        return self::$instance;
    }

    public function getConnect(){
        return $this->connection;
    }
}