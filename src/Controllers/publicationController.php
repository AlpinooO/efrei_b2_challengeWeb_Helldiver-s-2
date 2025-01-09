<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\PublicationModel;

class PublicationController extends CoreController
{
    public function publication()
    {
        $publication = new publicationModel();
        $publications = $publication->getAll();
        $this->render('forum/forum', ['publications' => $publications]);
    }

    public function aPublication()
    {
        $id = $_GET['id'];
        $publication = new PublicationModel($id);
        $publications = $publication->getOne();
        $comments = $publication->getCommentaires();
        $data = ['publications' => $publications];
        $data = ['comments' => $comments];
        $this->render('forum/publication', $data);
    }

    public function publier()
    {
        $message = htmlspecialchars($_POST['message']);
        $auteur = $_SESSION['user']['id_user'];
        $titre = htmlspecialchars($_POST['titre']);

        $messageModel = new PublicationModel(null, $message, $auteur, $titre);
        $messageModel->create();
        header('Location: /forum');
    }

    public function commenter()
    {
        $message = htmlspecialchars($_POST['message']);
        $auteur = $_SESSION['user']['id'];

        $messageModel = new PublicationModel(null, $message, $auteur);
        $messageModel->commentaire();
        header('Location: /forum');
    }

    public function supprimer()
    {
        $id = $_GET['id'];
        $publication = new PublicationModel($id);
        $publication->delete();
        header('Location: /forum');
    }
}