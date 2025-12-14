<?php
require_once '../app/models/Film.php';

class AccueilController {
    private $filmModel;

    public function __construct($db) {
        $this->filmModel = new Film($db);
    }

    public function handle() {
        $recherche = $_GET['rechercheFilm'] ?? null;
        $annee = $_GET['annee'] ?? null;
        $genre_id = $_GET['genre_id'] ?? null;

        $films  = $this->filmModel->filtrerFilms($recherche, $annee, $genre_id);
        $genres = $this->filmModel->getAllGenres();
        $annees = $this->filmModel->getAllAnneeSortie();
        
        require __DIR__ . '/../views/accueil.php';
    }
}
?>
