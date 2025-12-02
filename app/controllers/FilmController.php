<?php
require_once '../app/models/Film.php';

class FilmController {

    private $filmModel;

    public function __construct($db) {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->filmModel = new Film($db);
    }

    public function handle($get) {

        $action = $get['action'] ?? 'liste_films';

        switch ($action) {

            case 'dashboard':
                $this->dashboard();
                break;

            case 'liste_films':
                $this->liste_films();
                break;

            case 'show_film':
                if (!isset($get['id'])) die("ID du film manquant");
                $this->showFilm($get['id']);
                break;

            case 'add_film':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->addFilm($_POST);
                } else {
                    $this->addFilmForm();
                }
                break;

            case 'edit_film':
                if (!isset($get['id'])) die("ID manquant");
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->updateFilm($get['id'], $_POST);
                } else {
                    $this->editFilmForm($get['id']);
                }
                break;
            case 'delete_film':
                if (!isset($get['id'])) die("ID manquant");
                $this->deleteFilm($get['id']);
                break;

            default:
                http_response_code(404);
                require '../app/views/404.php';
                break;
        }
    }


    public function dashboard() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $films = $this->filmModel->getAllFilms();
        $nbFilms = count($films);
        require '../app/views/admin_dashboard.php';
    }



    public function liste_films() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $films = $this->filmModel->getAllFilms();
        require '../app/views/liste_films.php';
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


    public function addFilmForm() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $genres = $this->filmModel->getAllGenres();
        require '../app/views/film_form.php';
    }

    public function addFilm($post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->filmModel->addFilm($post);
        header("Location: index.php?action=liste_films");
        exit;
    }


    public function editFilmForm($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $film = $this->filmModel->getFilmById($id);
        $genres = $this->filmModel->getAllGenres();
        require '../app/views/film_form.php';
    }

    public function updateFilm($id, $post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->filmModel->updateFilm($id, $post);
        header("Location: index.php?action=liste_films");
        exit;
    }
    public function deleteFilm($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->filmModel->deleteFilm($id);

        header("Location: index.php?action=liste_films");
        exit;
    }
}
?>
