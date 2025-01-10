<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Controllers\PublicationController;

class MainController extends CoreController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }


    public function order()
    {
        $this->render('order');
    }
    // Page des especes
    public function species()
    {

        $this->render('species');
    }

    public function log()
    {
        $register = $_POST['register'];

        $user = new UserController();
        if (isset($register) && $register == 'register') {
            $user->registerUser();
        } else {
            $user->loginUser();
        }
    }

    public function map()
    {
        $this->render('map');
    }
    public function post()
    {
        $this->render('post');
    }

    public function publier()
    {
        $this->isConnected();
        $publication = new PublicationController();
        if (isset($_POST['parent'])) {
            $publication->commenter();
        } else {
            $publication->publier();
        }
    }

    public function publication()
    {
        $publication = new PublicationController();
        if (isset($_GET['id'])) {
            $publication->aPublication();
        } else {
            $publication->publication();
        }
    }

    public function banOrAdmin()
    {
        $this->isAdmin();
        $user = new UserController();
        $ban = $_POST['ban'];
        if (isset($ban) && $ban == 'ban') {
            $user->ban();
        } else if (isset($ban) && $ban == 'unban') {
            $user->unban();
        } else {
            $user->adminUser();
        }
    }

}