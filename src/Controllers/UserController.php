<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\UserModel;


class UserController extends CoreController
{
    // Page "logout"
    public function logout()
    {
        $this->isConnected();
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header('Location : /');
        exit();
    }
    //page "register"
    public function log()
    {
        $this->render('user/log');
    }

    // log l'utilisateur si les données correspondent
    public function loginUser()
    {
        // recuperation des champs des formulaire
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['nom']);
        $password = htmlspecialchars($_POST['MDP']);

        // Vérification des champs vides
        if (empty($username) || empty($password)) {
            $error = "Veuillez remplir tous les champs";
        } else {
            $user = new UserModel($email, $password, $username);
            $loggedUser = $user->login();
            if ($loggedUser) {
                $_SESSION['user'] = $user->getUser();
                header('Location: /');
                exit();
            } else {
                echo "Mot de passe incorrect";
            }
        }
    }

    // enregistre un utilisateur
    public function registerUser()
    {
        // recuperation des champs des formulaire
        $username = htmlspecialchars($_POST['nom']);
        $password = htmlspecialchars($_POST['MDP']);

        // Vérification des champs vides
        if (empty($username) || empty($password)) {
            echo "Veuillez remplir tous les champs";
        } else {
            $user = new UserModel(null, $password, $username, );
            if ($user->register()) {
                $_SESSION['user'] = $user->getUser();
                header('Location: /');
                exit();
            }
        }
    }
}