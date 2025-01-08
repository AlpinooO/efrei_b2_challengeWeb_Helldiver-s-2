<?php



namespace App\Models;
use App\Utils\Database;
use PDO;

class MessageModel
{
    private $email;
    private $MDP;
    private $nom;
    private $prenom;

    public function __construct($email = null, $MDP = null, $nom = null, $prenom = null)
    {
        $this->email = $email;
        $this->MDP = $MDP;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    // récupère l'id de l'utilisateur depuis son email
    public function getUserId()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $getID = $pdo->prepare($sqlQuery);
        $getID->execute([
            'email' => $this->email
        ]);
        return $getID->fetch();
    }

    // récupère le role de l'utilisateur
    public function getRole()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT titre FROM roles INNER JOIN users ON roles.id_role = users.id_role WHERE id_user = :id_user;";
        $getRole = $pdo->prepare($sqlQuery);
        $userID = $this->getUserId()['id_user'];
        $getRole->execute([
            'id_user' => $userID
        ]);
        return $getRole->fetch(PDO::FETCH_ASSOC);
    }

    // enregistre les information de l'utilisateur
    public function register()
    {
        $pdo = Database::getPDO();
        $membre = 2;
        $sqlQuery = "INSERT into users(email, MDP, nom, prenom, id_role) value(:email, :MDP, :nom, :prenom, $membre)";
        $addUser = $pdo->prepare($sqlQuery);
        $addUser->execute([
            'email' => $this->email,
            'MDP' => $this->MDP,
            'nom' => $this->nom,
            'prenom' => $this->prenom
        ]);
        return $this->getUserId();
    }

    // cherche dans la db le mot de passe qui correspond a l'email
    public function login()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT MDP FROM users WHERE email = :email";
        $loginRequest = $pdo->prepare($sqlQuery);
        $loginRequest->execute([
            'email' => $this->email
        ]);
        return $loginRequest->fetch();
    }

    // change le role de l'utilisateur en ADMIN
    public function addAdmin()
    {
        $pdo = Database::getPDO();
        $admin = 1;
        $sqlQuery = "UPDATE users SET id_role = $admin WHERE email = :email;";
        $adminRequest = $pdo->prepare($sqlQuery);
        $adminRequest->execute(
            [
                'email' => $this->email
            ]
        );
    }

    // regarde si l'email existe déjà
    public function getEmail()
    {
        $pdo = Database::getPDO();
        $sqlQuery = 'SELECT email FROM users WHERE email = :email';
        $emailRequest = $pdo->prepare($sqlQuery);
        $emailRequest->execute([
            'email' => $this->email
        ]);
        return $emailRequest;
    }
}

?>