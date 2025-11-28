<?php
require_once '../app/models/Film.php';

class AccueilController {
    private $filmModel;

    public function __construct($db) {
        $this->filmModel = new Film($db);
    }

    public function handle() {
        $films = $this->filmModel->getAllFilms();
        require __DIR__ . '/../views/accueil.php';
    }
}
?>
