<?php
require_once '../app/models/Film.php';
require_once '../app/models/Salle.php';
require_once '../app/models/Seance.php';
require_once '../app/models/User.php';


class FilmController {

    private $filmModel;
    private $seanceModel;
    private $salleModel;
    private $userModel;

    public function __construct($db) {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->filmModel = new Film($db);
        $this->seanceModel = new Seance($db);
        $this->salleModel = new Salle($db);
        $this->userModel = new User($db);
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

    $seances = $this->seanceModel->getAllSeances();
    $nbSeance = count($seances);

    $salles = $this->salleModel->getAllSalles();
    $nbSalles = count($salles);

    $users = $this->userModel->getAllUsers();
    $nbUsers = count($users);

    require '../app/views/admin_dashboard.php';
}

    public function liste_films() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $recherche = $_GET['rechercheFilm'] ?? null;
        $annee     = $_GET['annee'] ?? null;
        $genre_id  = $_GET['genre_id'] ?? null;

        $films  = $this->filmModel->filtrerFilms($recherche, $annee, $genre_id);
        $genres = $this->filmModel->getAllGenres();
        $annees = $this->filmModel->getAllAnneeSortie();

        require '../app/views/liste_films.php';
    }



    public function showFilm($id) {
        $film = $this->filmModel->getFilmById($id);

        if (!$film) {
            http_response_code(404);
            require '../app/views/404.php';
            return;
        }
       $seances = $this->seanceModel->getSeancesByFilm($id);

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
    public function addFilm($post){
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        //$this->filmModel->addFilm($post);

        $errors = $this->validateFilm($post);

        if (!empty($errors)) {
            $genres = $this->filmModel->getAllGenres();
            $old = $post;
            require '../app/views/film_form.php';
            return;
        }

        $data = $post;
        $data['photo'] = $_FILES['photo'] ?? null;
        $data['created_by'] = $_SESSION['user']['id'];

        $this->filmModel->addFilm($data);
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

    public function updateFilm($id, $post){
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        $errors = $this->validateFilm($post, $id);
        if (!empty($errors)) {
            $film = $this->filmModel->getFilmById($id);
            $genres = $this->filmModel->getAllGenres();
            $old = $post;
            require '../app/views/film_form.php';
            return;
        }
        $data = $post;
        $data['photo'] = $_FILES['photo'] ?? null;

        $this->filmModel->updateFilm($id, $data);

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
    private function validateFilm($data, $filmId = null){
        $errors = [];

        if (empty($data['titre']) || strlen($data['titre']) < 2) {
            $errors[] = "Le titre doit contenir au moins 2 caractères.";
        }

        if (empty($data['realisateur']) || strlen($data['realisateur']) < 2) {
            $errors[] = "Le nom du réalisateur doit contenir au moins 2 caractères.";
        }

        if (empty($data['genre_id']) || !is_numeric($data['genre_id'])) {
            $errors[] = "Veuillez sélectionner un genre valide.";
        }

        $annee = intval($data['annee_sortie']);
        $anneeActuelle = date("Y");

        if ($annee < 1880 || $annee > $anneeActuelle) {
            $errors[] = "L'année de sortie doit être comprise entre 1880 et $anneeActuelle.";
        }   

        if (!empty($data['description']) && strlen($data['description']) > 2000) {
            $errors[] = "La description est trop longue (2000 caractères max).";
        }

        if (
            empty($errors) &&
            !empty($data['titre']) &&
            !empty($data['realisateur']) &&
            !empty($annee)
        ) {
            if ($this->filmModel->filmExiste($data['titre'], $annee, $data['realisateur'], $filmId)) {
                $errors[] = "Un film avec le même titre, réalisateur et année existe déjà.";
            }
        }

        return $errors; 
    }
}
?>
