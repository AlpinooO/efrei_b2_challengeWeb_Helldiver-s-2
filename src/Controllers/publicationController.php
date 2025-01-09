<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\publicationModel;

class publicationController extends CoreController
{
    public function publication()
    {
        $publication = new publicationModel();
        $publications = $publication->getAll();
        $this->render('forum', ['publications' => $publications]);
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
        $parent = htmlspecialchars($_POST['parent']);

        $messageModel = new publicationModel(null, $message, $auteur, null, $parent);
        $messageModel->commentaire();
        header('Location: /forum');
    }
}