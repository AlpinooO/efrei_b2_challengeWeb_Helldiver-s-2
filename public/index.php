<?php
session_start();
// Ici j'inclus le fichier autoload.php car c'est grâce à ce fichier que je vais pouvoir inclure TOUTES mes dépendances composer (donc ce qu'il y a dans le dossier vendor)
require_once __DIR__ . "/../vendor/autoload.php";
// Change the path according to your project
use App\Controllers\MainController;
use App\Controllers\CoreController;
use App\Controllers\UserController;
use App\Controllers\publicationController;
use Alterouter\Alterouter;
use Alterouter\Request;

// Je créer une instance de Alterouter (la librairie que j'ai installé)
$router = new Alterouter();

// Create a route with the generic method "addRoute"
$router->addRoute('GET', '/', MainController::class . '@home', 'home');
$router->addRoute('GET', '/log', UserController::class . '@log', 'log');
$router->addRoute('POST', '/log', MainController::class . '@log', 'logPost');
$router->addRoute('GET', '/logout', UserController::class . '@logout', 'logout');
$router->addRoute('GET', '/forum', MainController::class . '@publication', 'publication');
$router->addRoute('POST', '/forum', PublicationController::class . '@publier', 'publier ');
$router->addRoute('GET', '/stratagem', MainController::class . '@stratagem', 'stratagem');
$router->addRoute('GET', '/species', MainController::class . '@species', 'species');

$route = $router->match(Request::getMethodFromGlobals(), Request::getPathFromGlobals());
// dump($match);

if ($route !== null) {
    if (is_string($route->getHandler())) {
        [$controller, $method] = explode('@', $route->getHandler());
        $controller = new $controller();
        $controller->$method($route->getMatches());
    } else {
        call_user_func_array($route->getHandler(), $route->getMatches());
    }
} else {
    // Handle 404
    $controller = new CoreController();
    $controller->notFound();
}