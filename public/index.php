<?php
session_start();
require_once('../config/db.php');
require_once __DIR__ . '/../config/config.php';

require_once('../app/controllers/AccueilController.php');
require_once('../app/controllers/AuthController.php');
require_once('../app/controllers/FilmController.php');

$action = $_GET['action'] ?? 'accueil';

$controller = null;


switch ($action) {

    case 'accueil':
        $controller = new AccueilController($db);
        break;
    case 'login':
    case 'logout':
        $controller = new AuthController($db);
        break;
    case 'films':
    case 'create_film':
    case 'edit_film':
    case 'show_film':
    case 'dashboard':
        $controller = new FilmController($db);
        break;
    default:
        http_response_code(404);
        require '../app/views/404.php';
        exit;
}


if (!$controller) {
    die("Contrôleur non trouvé pour l'action : " . htmlspecialchars($action));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost($_GET, $_POST);
} else {
    $controller->handle($_GET);
}
?>

