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
        // détruire la session
        session_destroy();

        header('Location: /');

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
        $password = htmlspecialchars($_POST['password']);
        // Vérification des champs vides
        if (empty($email) || empty($password)) {
            $error = "Veuillez remplir tous les champs";
            $this->render('user/log', ['error' => $error]);
        } else {
            $user = new UserModel($email, $password, );
            $user->isUser();

            if (empty($user->isUser())) {
                $error = "Utilisateur inconnu";
                $this->render('user/log', ['error' => $error]);
            }

            $loggedUser = $user->login();
            if ($loggedUser) {
                $_SESSION['user'] = $user->getUser();
                header('Location: /');
                exit();
            } else {
                $error = "Mot de passe incorrect";
                $this->render('user/log', ['error' => $error]);
            }
        }
    }

    // enregistre un utilisateur
    public function registerUser()
    {
        // recuperation des champs des formulaire
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);

        // Vérification des champs vides
        if (empty($email) || empty($password)) {
            $error = "Veuillez remplir tous les champs";
            $this->render('user/log', ['error' => $error]);
        } else {
            $user = new UserModel($email, $password, $username);
            if ($user->register()) {
                $_SESSION['user'] = $user->getUser();
                header('Location: /');
                exit();
            }
        }
    }
}