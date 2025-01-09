<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\publicationModel;

class publicationController extends CoreController
{
    public function publication()
    {
        $this->render('publication');
    }

    public function publier()
    {
        $message = htmlspecialchars($_POST['message']);
        $auteur = $_SESSION['user']['id'];
        $titre = htmlspecialchars($_POST['titre']);

        $messageModel = new publicationModel(null, $message, $auteur, $titre);
        $messageModel->create();
        header('Location: /forum');
    }

    public function commenter()
    {
        $message = htmlspecialchars($_POST['message']);
        $auteur = $_SESSION['user']['id'];

        $messageModel = new publicationModel(null, $message, $auteur);
        $messageModel->commentaire();
        header('Location: /forum');
    }
}