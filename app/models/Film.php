<?php

class Film {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllFilms() {
        $stmt = $this->db->query("
            SELECT films.*, genres.nom AS genre_nom
            FROM films
            INNER JOIN genres ON films.genre_id = genres.id
            ORDER BY films.annee_sortie DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id){
        $stmt = $this->db->prepare("
            SELECT films.*, genres.nom AS genre_nom
            FROM films
            INNER JOIN genres ON films.genre_id = genres.id
            WHERE films.id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFilm($data) {

    $affiche = null;

    if (isset($data['photo']) && $data['photo']['tmp_name'] != '') {

        $filename = time() . '_' . $data['photo']['name'];
        $destination = __DIR__ . '/../../public/images/' . $filename;

        if (move_uploaded_file($data['photo']['tmp_name'], $destination)) {
            $affiche = $filename;
        }
    }

    $sql = "
        INSERT INTO films (titre, realisateur, genre_id, annee_sortie, description, affiche_film, created_by)
        VALUES (:titre, :realisateur, :genre_id, :annee_sortie, :description, :affiche_film, :created_by)
    ";

    $stmt = $this->db->prepare($sql);

    $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre_id' => $data['genre_id'],
        ':annee_sortie' => $data['annee_sortie'],
        ':description' => $data['description'],
        ':affiche_film' => $affiche,
         ':created_by'   => $data['created_by']
    ]);

}


public function updateFilm($id, $data) {

    $film = $this->getFilmById($id);

    $affiche = $film['affiche_film'];

    if (isset($data['photo']) && $data['photo']['tmp_name'] != '') {

        $filename = time() . '_' . $data['photo']['name'];
        $destination = __DIR__ . '/../../public/images/' . $filename;

        if (move_uploaded_file($data['photo']['tmp_name'], $destination)) {
            $affiche = $filename;
        }
    }

    $sql = "
        UPDATE films SET
            titre = :titre,
            realisateur = :realisateur,
            genre_id = :genre_id,
            annee_sortie = :annee_sortie,
            description = :description,
            affiche_film = :affiche_film
        WHERE id = :id
    ";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([
        ':titre' => $data['titre'],
        ':realisateur' => $data['realisateur'],
        ':genre_id' => $data['genre_id'],
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
        $stmt = $this->db->query("SELECT * FROM genres ORDER BY nom");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllAnneeSortie() {
        $stmt = $this->db->prepare(" SELECT DISTINCT annee_sortie FROM films ORDER BY annee_sortie ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function filtrerFilms($recherche, $annee, $genre_id) {
        $sql = "
            SELECT films.*, genres.nom AS genre_nom
            FROM films
            INNER JOIN genres ON films.genre_id = genres.id
            WHERE 1=1
        ";
        $params = [];

        if ($recherche != '') {
            $sql .= " AND films.titre LIKE :recherche";
            $params[':recherche'] = '%' . $recherche . '%';
        }

        if ($annee != '') {
            $sql .= " AND films.annee_sortie = :annee";
            $params[':annee'] = $annee;
        }

        if ($genre_id != '') {
            $sql .= " AND films.genre_id = :genre_id";
            $params[':genre_id'] = $genre_id;
        }

        $sql .= " ORDER BY films.titre ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
