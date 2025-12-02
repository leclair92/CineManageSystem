<?php
class Film {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllFilms() {
        $stmt = $this->db->query("SELECT f.*, g.nom AS genre_nom
                FROM films f
                INNER JOIN genres g ON f.genre_id = g.id
                ORDER BY f.annee_sortie DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id) {
        $stmt = $this->db->prepare("  SELECT f.*, g.nom AS genre_nom
            FROM films f
            INNER JOIN genres g ON f.genre_id = g.id
            WHERE f.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFilm($data) {
        //$affiche = $data['photo'] ?? null;

        $stmt = $this->db->prepare("
        INSERT INTO films (titre, realisateur, genre_id, annee_sortie, description) 
        VALUES (:titre, :realisateur, :genre_id, :annee_sortie, :description)
        ");

        $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre_id' => $data['genre_id'],
        ':annee_sortie' => $data['annee_sortie'],
        ':description' => $data['description'],
        //':affiche_film' => $affiche
        ]);
        return $this->db->lastInsertId();
    }
    public function updateFilm($id, $data) {
  
        //$affiche = $data['photo'] ?? $data['ancienne_photo'] ?? null;

        $stmt = $this->db->prepare("  UPDATE films
            SET titre = :titre,
                realisateur = :realisateur,
                genre_id = :genre_id,
                annee_sortie = :annee_sortie,
                description = :description
            WHERE id = :id
        ");

        return $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre_id'     => $data['genre_id'],
        ':annee_sortie' => $data['annee_sortie'],
        ':description' => $data['description'],
        //':affiche_film' => $affiche,
        ':id' => $id
        ]);
    }
    public function deleteFilm($id) {
        $stmt = $this->db->prepare("DELETE FROM films WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function getAllAnneeSortie() {
        $stmt = $this->db->prepare(" SELECT DISTINCT annee_sortie FROM films ORDER BY annee_sortie ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function getAllGenres() {
        $sql = "SELECT * FROM genres ORDER BY nom";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
public function filtrerFilms($recherche, $annee, $genre_id) {

    $sql = "SELECT f.*, g.nom AS genre_nom
                FROM films f
                INNER JOIN genres g ON f.genre_id = g.id
                WHERE 1=1";
    $params = [];

    if (!empty($recherche)) {
        $sql .= " AND f.titre LIKE :recherche";
        $params[':recherche'] = "%$recherche%";
    }

    if (!empty($annee)) {
        $sql .= " AND f.annee_sortie = :annee";
        $params[':annee'] = $annee;
    }

    if (!empty($genre_id)) {
        $sql .= " AND f.genre_id = :genre_id";
        $params[':genre_id'] = $genre_id;
    }

    $sql .= " ORDER BY f.titre ASC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    
}
?>