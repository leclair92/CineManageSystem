<?php
require_once '../app/models/Film.php';

class FilmController {
    private $filmModel;

    public function __construct($db) {
        $this->filmModel = new Film($db);
    }

    public function handle($get) {

        $action = $get['action'] ?? 'films';

        switch ($action) {
            case 'dashboard' :
                $this -> dashboard();
                break;

            case 'show_film':
                if (!isset($get['id'])) {
                    die("ID du film manquant");
                }
                $this->showFilm($get['id']);
                break;

            default:
                $films = $this->filmModel->getAllFilms();
                require '../app/views/accueil.php';
                break;
        }
    }

    public function showFilm($id) {
        $film = $this->filmModel->getFilmById($id);

        if (!$film) {
            http_response_code(404);
            require '../app/views/404.php';
            return;
        }

        require '../app/views/film_details.php';
    }
    public function dashboard() {
    
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $films = $this->filmModel->getAllFilms();

    require '../app/views/admin_dashboard.php';
    }

}
?>
