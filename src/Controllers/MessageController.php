<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\MessageModel;

class MessageController extends CoreController
{
    // Page "logout"
    public function logout()
    {
        $this->isConnected();
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        header('Location: /');
        exit();
    }

    // Page "register"
    public function register()
    {
        $this->render('user/register');
    }

    // Log l'utilisateur si les données correspondent
    public function loginUser()
    {
        if (
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['MDP']) && !empty($_POST['MDP'])
        ) {
            $userModel = new UserModel();
            $userMDP = $userModel->getPasswordByEmail($_POST['email']); // Récupère le MDP depuis l'email

            if ($userMDP && password_verify($_POST['MDP'], $userMDP['MDP'])) { // Compare les MDP (hashés)
                $userID = $userModel->getUserIdByEmail($_POST['email']);
                $_SESSION['userID'] = $userID['id_user']; // Stocke l'ID utilisateur dans la session

                $userRole = $userModel->getRoleById($userID['id_user']);
                $_SESSION['userRole'] = $userRole['titre']; // Stocke le rôle utilisateur dans la session

                header('Location: /'); // Redirige vers la page d'accueil
                exit();
            } else {
                $this->render('user/login');
                echo '<script>alert("Mot de passe ou identifiant incorrect");</script>';
            }
        }
    }

    // Affiche la page pour écrire un message
    public function createMessage()
    {
        $this->isConnected(); // Vérifie que l'utilisateur est connecté
        $this->render('message/create');
    }

    // Enregistre un nouveau message
    public function postMessage()
    {
        $this->isConnected(); // Vérifie que l'utilisateur est connecté

        if (
            isset($_POST['auteur']) && !empty($_POST['auteur']) &&
            isset($_POST['titre']) && !empty($_POST['titre']) &&
            isset($_POST['message']) && !empty($_POST['message'])
        ) {
            $messageModel = new MessageModel();
            $messageModel->createMessage([
                'auteur' => $_POST['auteur'],
                'titre' => $_POST['titre'],
                'message' => $_POST['message']
            ]);

            header("Location: /messages"); // Redirige vers la liste des messages
            exit();
        } else {
            $this->createMessage(); // Retourne au formulaire de création
            echo '<script>alert("Données incorrectes ou manquantes");</script>';
        }
    }

    // Liste des messages
    public function listMessages()
    {
        $this->isConnected(); // Vérifie que l'utilisateur est connecté
        $messageModel = new MessageModel();
        $messages = $messageModel->getAllMessages();
        $this->render('message/list', ['messages' => $messages]);
    }
}
