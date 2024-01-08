<?php
namespace App\Model;
include __DIR__.'../../vendor/autoload.php';
use App\Connection\Connect;
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
}