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
        $sql = "INSERT INTO publication (message, auteur, titre_post, publication) VALUES (:message, :auteur, :titre, '$date')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':message' => $this->message,
            ':auteur' => $this->auteur,
            ':titre' => $this->titre
        ]);
    }

    public function commentaire()
    {
        $date = date('Y-m-d H:i:s');
        $pdo = Database::getPDO();
        $sql = "INSERT INTO publication (message, auteur, publication, parent) VALUES (:message, :auteur, '$date' , :parent)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':message' => $this->message,
            ':titre' => $this->titre,
            ':auteur' => $this->auteur,
            ':parent' => $this->parent
        ]);
    }

    public function getAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication
            INNER JOIN users ON publication.auteur = users.id_user
            INNER JOIN roles ON users.id_role = roles.id_role";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $publications = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $publications;
    }

    public function getOne()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication
            INNER JOIN users ON publication.auteur = users.id_user
            INNER JOIN roles ON users.id_role = roles.id_role WHERE id_post = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        $publication = $stmt->fetch();
        return $publication;
    }

    public function delete()
    {
        $pdo = Database::getPDO();
        $sql = "DELETE FROM publication WHERE id_post = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $this->id]);
    }

    public function update()
    {
        $pdo = Database::getPDO();
        $sql = "UPDATE publication SET message = :message, auteur = :auteur WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':message' => $this->message,
            ':id' => $this->id
        ]);
    }

    public function getCommentaires()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM publication WHERE parent = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        $commentaires = $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Models\publicationModel');
        return $commentaires;
    }
}