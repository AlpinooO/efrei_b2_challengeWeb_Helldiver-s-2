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

    public function stratagem()
    {
        $this->render('stratagem');
    }
}