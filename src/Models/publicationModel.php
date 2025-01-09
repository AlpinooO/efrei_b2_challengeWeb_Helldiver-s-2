<?php



namespace App\Models;
use App\Utils\Database;
use PDO;

class PublicationModel
{
    private $id;
    private $message;
    private $parent;
    private $auteur;
    private $titre;

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
        $sql = "INSERT INTO publication (message, auteur, date, parent) VALUES (:message, :auteur, $date , :parent)";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':message' => $this->message,
            ':titre' => $this->titre,
            ':auteur' => $this->auteur,
            ':parent' => $this->parent
        ]);
    }

    public function getAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication";
        $query = $pdo->query($sql);
        $publications = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\publicationModel');
        return $publications;
    }

    public function getOne()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([':id' => $this->id]);
        $publication = $query->fetchObject('App\Models\publicationModel');
        return $publication;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        $sql = "DELETE FROM publication WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([':id' => $this->id]);
    }

    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "UPDATE publication SET message = :message, auteur = :auteur WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->execute([
            ':message' => $this->message,
            ':id' => $this->id
        ]);
    }

    public function getCommentaires()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication WHERE parent = :id";
        $query = $pdo->prepare($sql);
        $query->execute([':id' => $this->id]);
        $commentaires = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\publicationModel');
        return $commentaires;
    }
}