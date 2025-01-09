<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class userModel
{
    private $email;
    private $MDP;
    private $name;

    public function __construct($email = null, $MDP = null, $name = null)
    {
        $this->email = $email;
        $this->MDP = $MDP;
        $this->name = $name;
    }

    // récupère l'id de l'utilisateur depuis son email
    public function getUserId()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT id_user FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute([
            'email' => $this->email
        ]);
        return $stmt->fetch();
    }

    // récupère le role de l'utilisateur
    public function getUser()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT id_user,nom,email,titre FROM roles INNER JOIN users ON roles.id_role = users.id_role WHERE id_user = :id_user;";
        $userID = $this->getUserId()['id_user'];
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute([
            'id_user' => $userID
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // enregistre les information de l'utilisateur
    public function register()
    {
        // $hashed_password = password_hash($this->MDP, PASSWORD_DEFAULT);
        $pdo = Database::getPDO();
        $membre = 2;
        $sqlQuery = "INSERT INTO users(nom, email, mdp, id_role) values(:name, :email, :mdp, $membre)";
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute([
            'name' => $this->name,
            'email' => $this->email,
            // 'MDP' => $hashed_password,
            'mdp' => $this->MDP,
        ]);
        return $this->getUser();
    }

    // cherche dans la db le mot de passe qui correspond a l'email
    public function login()
    {
        $pdo = Database::getPDO();
        $sqlQuery = "SELECT mdp FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute([
            'email' => $this->email
        ]);
        $user = $stmt->fetch();

        // TODO: A décommenter lorsque le hashage des mots de passe sera effectif meme pour l'admin
        // if ($user && password_verify($this->MDP, $user['MDP'])) {
        //     return $user;
        // } else {
        //     return false;
        // }

        if ($user && $this->MDP == $user['mdp']) {
            return $user;
        } else {
            return false;
        }
    }

    // change le role de l'utilisateur en ADMIN
    public function addAdmin()
    {
        $pdo = Database::getPDO();
        $admin = 1;
        $sqlQuery = "UPDATE users SET id_role = $admin WHERE email = :email;";
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute(
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
        $stmt = $pdo->prepare($sqlQuery);
        $stmt->execute([
            'email' => $this->email
        ]);
        return $stmt->fetch();
    }
}