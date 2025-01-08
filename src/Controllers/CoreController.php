<?php

// On va imaginer qu'il y a un dossier App puis un dossier controller dedans et on va ranger cette classe (CatalogController) dedans
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\categoriesModel;

class CoreController
{
    public function notFound()
    {
        http_response_code(404); // renvois une erreur 404 si la page n'existe pas
        echo "404 - Page Not Found!";
    }

    // Méthode pour inclure une vue
    public function render($view, $data = [])
    {
        // TODO : a enlever lors de la mise en prod
        // // Transmet les données aux vues
        // $categoryModel = new categoriesModel;
        // $categoryHeader = $categoryModel->getAllCategories();
        // extract($categoryHeader); // data pour le header
        extract($data);

        //pwd
        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../../templates/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../../templates/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../../templates/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }

    // Si l'utilisateur n'est pas connecté renvoie vers la page de connexion
    public function isConnected()
    {
        if (!$_SESSION['userID']) {
            header('Location: /login');
            exit();
        }
    }

    // Si l'utilisateur n'est pas admin renvoie vers la page de home
    public function isAdmin()
    {
        $this->isConnected();
        if (!($_SESSION['userRole'] == 'ADMIN')) {
            header('Location: /');
            exit();
        }

    }

}