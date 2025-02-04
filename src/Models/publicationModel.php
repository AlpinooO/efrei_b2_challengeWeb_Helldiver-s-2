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
        // récupération de la date actuelle en format SQL
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
            ':auteur' => $this->auteur,
            ':parent' => $this->parent
        ]);
    }

    public function getAllPubli()
    {
        $pdo = Database::getPDO();
        // récupération des publications sans parent (donc les publications principales)
        $sql = "SELECT titre_post,message,publication,id_post,nom,id_user FROM publication
            INNER JOIN users ON publication.auteur = users.id_user
            INNER JOIN roles ON users.id_role = roles.id_role where parent is null";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $publications = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $publications;
    }

    public function getOne()
    {
        // récupération de la publication sélectionner
        $pdo = Database::getPDO();
        $sql = "SELECT titre_post,message,publication,id_post,nom,id_user FROM publication
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

    public function getCommentaires()
    {
        // récupération des commentaires de la publication sélectionner
        $pdo = Database::getPDO();
        $sql = "SELECT titre_post,message,publication,id_post,nom,id_user FROM publication
            INNER JOIN users ON publication.auteur = users.id_user
            INNER JOIN roles ON users.id_role = roles.id_role WHERE parent = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        $commentaires = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $commentaires;
    }

}