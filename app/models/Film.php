<?php
class Film {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllFilms() {
        $stmt = $this->db->query("SELECT films.*, genre.nom AS genre_nom
            FROM films
            INNER JOIN genre ON films.genre = genre.id
            ORDER BY films.annee_sortie DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id) {
        $stmt = $this->db->prepare("SELECT films.*, genre.nom AS genre_nom
        FROM films
        JOIN genre ON films.genre = genre.id
        WHERE films.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFilm($data) {
        $affiche = $data['photo'] ?? null;

        $stmt = $this->db->prepare("
        INSERT INTO films (titre, realisateur, genre, annee_sortie, description, affiche_film) 
        VALUES (:titre, :realisateur, :genre, :annee_sortie, :description, :affiche_film)
        ");

        $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre' => $data['genre'],
        ':annee_sortie' => $data['annee_sortie'],
        ':description' => $data['description'],
        ':affiche_film' => $affiche
        ]);
        return $this->db->lastInsertId();
    }
    public function updateFilm($id, $data) {
  
        $affiche = $data['photo'] ?? $data['ancienne_photo'] ?? null;

        $stmt = $this->db->prepare("
        UPDATE films 
        SET titre = :titre, realisateur = :realisateur, genre = :genre, annee_sortie = :annee_sortie, description = :description, affiche_film = :affiche_film
        WHERE id = :id
        ");

        return $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre' => $data['genre'], // ID du genre
        ':annee_sortie' => $data['annee_sortie'],
        ':description' => $data['description'],
        ':affiche_film' => $affiche,
        ':id' => $id
        ]);
    }
    public function deleteFilm($id) {
        $stmt = $this->db->prepare("DELETE FROM films WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function getAllGenres() {
        $sql = "SELECT * FROM genre ORDER BY nom";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>