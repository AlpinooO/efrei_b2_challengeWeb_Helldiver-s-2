<?php

// On va imaginer qu'il y a un dossier App puis un dossier controller dedans et on va ranger cette classe (CatalogController) dedans
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\categoriesModel;

class CoreController
{
    public function notFound()
    {
        http_response_code(404); 
        echo "404 - Page Not Found!";
    }


    public function render($view, $data = [])
    {

        extract($data);


        $viewFile = __DIR__ . '/../../templates/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once __DIR__ . '/../../templates/partials/header.php';
            require_once $viewFile;
            require_once __DIR__ . '/../../templates/partials/footer.php';
        } else {
            echo "View not found: $view";
        }
    }

   
    public function isConnected()
    {
        if (!$_SESSION['userID']) {
            header('Location: /login');
            exit();
        }
    }

    public function isAdmin()
    {
        $this->isConnected();
        if (!($_SESSION['userRole'] == 'ADMIN')) {
            header('Location: /');
            exit();
        }

    }

}