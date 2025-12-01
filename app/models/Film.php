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

    public function getAnneeSortie() {
        $stmt = $this->db->prepare("SELECT DISTINCT annee_sortie FROM films ORDER BY annee_sortie ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function getGenres() {
        $stmt = $this->db->prepare("SELECT DISTINCT genre FROM films ORDER BY genre ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function filtrerFilms($recherche, $annee, $genre) {

    $sql = "SELECT * FROM films WHERE 1=1";
    $params = [];

    if (!empty($recherche)) {
        $sql .= " AND titre LIKE :recherche";
        $params[':recherche'] = "%$recherche%";
    }

    if (!empty($annee)) {
        $sql .= " AND annee_sortie  = :annee";
        $params[':annee'] = $annee;
    }

    if (!empty($genre)) {
        $sql .= " AND genre = :genre";
        $params[':genre'] = $genre;
    }

    $sql .= " ORDER BY titre ASC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
?>