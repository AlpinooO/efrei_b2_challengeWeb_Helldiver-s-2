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

            // Vérification si l'utilisateur existe déjà dans la base de données
            if (empty($user->isUser())) {
                $error = "Utilisateur inconnu";
                $this->render('user/log', ['error' => $error]);
            }
            // Vérification de si l'utilisateur est banni
            if ($user->isBanned()) {
                $error = "vous êtes banni";
                $this->render('user/log', ['error' => $error]);
            }

            // Vérification du mot de passe de l'utilisateur
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
            // Vérification si l'utilisateur existe déjà dans la base de données
            if ($user->isUser()) {
                $error = "Utilisateur déjà existant";
                $this->render('user/log', ['error' => $error]);
            } else {
                // Enregistrement de l'utilisateur
                if ($user->register()) {
                    $_SESSION['user'] = $user->getUser();
                    header('Location: /');
                    exit();
                }
            }
        }
    }

    public function admin()
    {
        $this->isAdmin();
        $this->render('user/admin');
    }

    // Méthodes pour les actions admin de base
    private function adminBase()
    {
        $this->isAdmin();
        $email = htmlspecialchars($_POST['email']);
        $user = new UserModel($email);
        if (!$user->isUser()) {
            $error = "Utilisateur inconnu";
            $this->render('user/admin', ['error' => $error]);
            exit();
        }
        if ($user->isAdmin()) {
            $error = "cet utilisateur est admin";
            $this->render('user/admin', ['error' => $error]);
            exit();
        }
        return $user;
    }

    // Méthode pour vérifier si l'utilisateur est banni
    private function isBan($user)
    {
        if ($user->isBanned()) {
            $error = "Utilisateur banni";
            $this->render('user/admin', ['error' => $error]);
            exit();
        }
    }

    public function ban()
    {
        $user = $this->adminBase();
        $this->isBan($user);
        $user->banUser();
        $success = "Utilisateur banni";
        $this->render('user/admin', ['succes' => $success]);
    }

    public function unban()
    {
        $user = $this->adminBase();
        $user->unbanUser();
        $success = "Utilisateur débanni";
        $this->render('user/admin', ['succes' => $success]);
    }

    public function adminUser()
    {
        $user = $this->adminBase();
        $this->isBan($user);
        $user->addAdmin();
        $success = "Utilisateur promu admin";
        $this->render('user/admin', ['succes' => $success]);
    }
}