<?php

namespace App\Controllers;

use App\Controllers\CoreController;

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
            $user->loginUser();
        } else {
            $user->registerUser();
        }
    }

    public function stratagem()
    {
        $this->render('stratagem');
    }
}