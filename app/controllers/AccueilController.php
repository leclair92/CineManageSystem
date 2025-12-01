<?php
require_once '../app/models/Film.php';

class AccueilController {
    private $filmModel;

    public function __construct($db) {
        $this->filmModel = new Film($db);
    }

    public function handle() {
        $recherche = $_GET['rechercheFilm'] ?? null;
        $annee  = $_GET['annee'] ?? null;
        $genre  = $_GET['genre'] ?? null;

        $films  = $this->filmModel->filtrerFilms($recherche, $annee, $genre);
        $genres = $this->filmModel->getGenres();
        $annees = $this->filmModel->getAnneeSortie();
        require __DIR__ . '/../views/accueil.php';
    }
}
?>
