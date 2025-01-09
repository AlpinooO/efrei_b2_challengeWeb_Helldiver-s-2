<?php



namespace App\Models;
use App\Utils\Database;
use PDO;

class publicationModel
{
    private $id;
    private $message;
    private $auteur;
    private $titre;

    private $parent;

    public function __construct($id = null, $message = null, $auteur = null, $titre = null, $parent = null)
    {
        $this->id = $id;
        $this->message = $message;
        $this->auteur = $auteur;
        $this->titre = $titre;
        $this->parent = $parent;
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
        $sql = "INSERT INTO publication (message, auteur, date, parent) VALUES (:message, :auteur, $date, :parent)";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':message' => $this->message,
            ':auteur' => $this->auteur,
            ':parent' => $this->parent
        ]);
    }

    public function supprimer()
    {
        $pdo = Database::getPDO();
        $sql = "DELETE FROM publication WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':id' => $this->id
        ]);
    }

    public function getAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':id' => $this->id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}