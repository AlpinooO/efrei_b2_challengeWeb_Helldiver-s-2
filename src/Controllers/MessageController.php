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
        header('Location : /');
        exit();
    }
    //page "register"
    public function register()
    {
        $this->render('user/register');
    }

    // log l'utilisateur si les données correspondent
    public function loginUser()
    {
        if (
            (isset($_POST['email']) && !empty($_POST['email']))
            && (isset($_POST['MDP']) && !empty($_POST['MDP']))
        ) {
            $userModel = new UserModel($_POST['email'], $_POST['MDP']); // verrifie si toutes les données existe
            $userMDP = $userModel->login(); // cherche le MDP depuis l'email

            if ($userMDP['MDP'] == $_POST['MDP']) { // commparre les MDP
                $userID = $userModel->getUserId();
                $_SESSION['userID'] = $userID['id_user']; // met dans la session l'id de l'utilisateur

                $userRole = $userModel->getRole();
                $_SESSION['userRole'] = $userRole['titre']; // met dans la session le role de l'utilisateur
                header('Location : /'); // renvient sur home
                exit();

            } else {
                $this->render('user/login');
                echo '<script>alert("Mot de passe ou identifiant incorrect");</script>'; // envoie une  alert comme quoi le MDP est mauvais
            }
        }
    }

    // enregistre un utilisateur
    public function registerPost()
    {
        if (
            (isset($_POST['auteur']) && !empty($_POST['auteur']))
            && (isset($_POST['titre']) && !empty($_POST['titre']))
            && (isset($_POST['message']) && !empty($_POST['message']))
            
        ) { // verrification des données
            $messageModel = new MessageModel($_POST['auteur'], $_POST['titre'], $_POST['message']);
            if (!$messageModel->getEmail()) { // verrifie si l'email existe déjà
                echo 'a';
                $userID = $messageModel->register();
                $_SESSION['userID'] = $userID['id_user']; // met dans la session l'id de l'utilisateur

                $userRole = $messageModel->getRole();
                $_SESSION['userRole'] = $userRole['titre']; // met dans la session le role de l'utilisateur

                header("Location : /"); // renvient sur home
                exit();
            } else {
                $this->register(); // renvoie sur la page register
                echo '<script>alert("l\'email existe déjà");</script>'; // envoie une alert comme quoi l'email existe déjà
            }
        } else {
            $this->register(); // renvoie sur la page register
            echo '<script>alert("donné incorecte ou manquante");</script>'; // envoie une alert comme quoi les données sont mauvaise
        }
    }
}