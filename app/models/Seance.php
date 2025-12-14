<?php

class Seance {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSeances() {
        $stmt = $this->db->query("
            SELECT seances.*, films.titre AS film_titre, salles.nom AS salle_nom
            FROM seances
            INNER JOIN films ON seances.film_id = films.id
            INNER JOIN salles ON seances.salle_id = salles.id
            ORDER BY seances.date_heure DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


public function getSeanceById($id) {
    $stmt = $this->db->prepare("
        SELECT 
            seances.*, films.titre AS film_titre, salles.nom AS salle_nom
        FROM seances
        INNER JOIN films ON seances.film_id = films.id
        INNER JOIN salles ON seances.salle_id = salles.id
        WHERE seances.id = :id
    ");

    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function getSeancesByFilm($film_id) {
    $stmt = $this->db->prepare("
        SELECT seances.*, salles.nom AS salle_nom
        FROM seances
        INNER JOIN salles ON seances.salle_id = salles.id
        WHERE seances.film_id = :film_id
        ORDER BY seances.date_heure ASC
    ");
    $stmt->execute([':film_id' => $film_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function addSeance($data) {
        $stmt = $this->db->prepare("
            INSERT INTO seances (film_id, salle_id, date_heure)
            VALUES (:film_id, :salle_id, :date_heure)
        ");

        $stmt->execute([
            ':film_id'    => $data['film_id'],
            ':salle_id'   => $data['salle_id'],
            ':date_heure' => $data['date_heure']
        ]);

        return $this->db->lastInsertId();
    }

    public function updateSeance($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE seances
            SET film_id = :film_id,
                salle_id = :salle_id,
                date_heure = :date_heure
            WHERE id = :id
        ");

        return $stmt->execute([
            ':film_id'    => $data['film_id'],
            ':salle_id'   => $data['salle_id'],
            ':date_heure' => $data['date_heure'],
            ':id'         => $id
        ]);
    }

    public function deleteSeance($id) {
        $stmt = $this->db->prepare("
            DELETE FROM seances
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }
}
