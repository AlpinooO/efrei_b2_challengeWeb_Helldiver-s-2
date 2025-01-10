<?php
namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\PublicationModel;

class PublicationController extends CoreController
{

    // page Forum ou on afficher toutes les publications sans parent
    public function publication()
    {
        $publication = new publicationModel();
        $publications = $publication->getAllPubli();
        $this->render('forum/forum', ['publications' => $publications]);
    }

    // page publication ou on affiche une publication avec ses commentaires
    public function aPublication()
    {
        $id = $_GET['id'];
        $publication = new PublicationModel($id);
        $publications = $publication->getOne();
        $comments = $publication->getCommentaires();
        $data = ['publication' => $publications, 'comments' => $comments];
        $this->render('forum/publication', $data);
    }

    // method pour publier une publication
    public function publier()
    {
        $message = htmlspecialchars($_POST['message']);
        $auteur = $_SESSION['user']['id_user'];
        $titre = htmlspecialchars($_POST['titre']);

        $PublicationModel = new PublicationModel(null, $message, $auteur, $titre);
        $PublicationModel->create();
        header('Location: /forum');
    }

    // method pour commenter une publication
    public function commenter()
    {
        $message = htmlspecialchars($_POST['message']);
        $parent = htmlspecialchars($_POST['parent']);
        $auteur = $_SESSION['user']['id_user'];

        $PublicationModel = new PublicationModel(null, $message, $auteur, null, $parent);
        $PublicationModel->commentaire();
        header('Location: /forum?id=' . $parent);
    }

    // method pour supprimer une publication
    public function supprimer()
    {
        $id = $_GET['id'];
        $comments = $_GET['comments'];
        $publication = new PublicationModel($id);
        $publication->delete();
        if ($comments != 0) {
            header('Location: /forum?id=' . $comments);
            exit();
        }
        header('Location: /forum');
        exit();
    }
}