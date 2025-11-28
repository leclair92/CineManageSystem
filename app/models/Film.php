<?php
class Film {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllFilms() {
        $stmt = $this->db->query("SELECT * FROM films ORDER BY annee_sortie DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id) {
        $stmt = $this->db->prepare("SELECT * FROM films WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFilm($data) {
        $stmt = $this->db->prepare("INSERT INTO films (titre, realisateur, genre, annee_sortie, description) VALUES (:titre, :realisateur, :genre, :annee_sortie, :description)");
        $stmt->execute([
            ':titre' => $data['titre'],
            ':realisateur' => $data['realisateur'],
            ':genre' => $data['genre'],
            ':annee_sortie' => $data['annee_sortie'],
            ':description' => $data['description']
        ]);
        return $this->db->lastInsertId();
    }

    public function updateFilm($id, $data) {
        $stmt = $this->db->prepare("UPDATE films SET titre = :titre, realisateur = :realisateur, genre = :genre, annee_sortie = :annee_sortie, description = :description WHERE id = :id");
        return $stmt->execute([
            ':titre' => $data['titre'],
            ':realisateur' => $data['realisateur'],
            ':genre' => $data['genre'],
            ':annee_sortie' => $data['annee_sortie'],
            ':description' => $data['description'],
            ':id' => $id
        ]);
    }

    public function deleteFilm($id) {
        $stmt = $this->db->prepare("DELETE FROM films WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>