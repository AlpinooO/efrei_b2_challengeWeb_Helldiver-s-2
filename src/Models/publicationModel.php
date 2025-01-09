<?php



namespace App\Models;
use App\Utils\Database;
use PDO;

class publicationModel
{
    private $id;
    private $message;
    private $publication;
    private $auteur;
    private $titre;

    public function __construct($id = null, $message = null, $auteur = null, $titre = null)
    {
        $this->id = $id;
        $this->message = $message;
        $this->auteur = $auteur;
        $this->titre = $titre;
    }
    public function create()
    {
        $date = date('Y-m-d H:i:s');
        $pdo = Database::getPDO();
        $sql = "INSERT INTO publication (message, auteur, titre, date) VALUES (:message, :auteur, :titre, $date)";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':message' => $this->message,
            ':auteur' => $this->auteur,
            ':titre' => $this->titre
        ]);
    }

    public function commentaire()
    {
        $date = date('Y-m-d H:i:s');
        $pdo = Database::getPDO();
        $sql = "INSERT INTO publication (message, auteur, date) VALUES (:message, :auteur, $date)";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':message' => $this->message,
            ':titre' => $this->titre
        ]);
    }
}