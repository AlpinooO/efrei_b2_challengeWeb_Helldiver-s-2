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

    public function publier()
    {
        $parent = $_POST['parent'];

        $publication = new PublicationController();
        if (isset($parent)) {
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
}