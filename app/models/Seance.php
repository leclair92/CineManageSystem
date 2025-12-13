<?php
class Seance {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSeances() {
        $stmt = $this->db->query("
            SELECT 
                s.*, 
                f.titre AS film_titre,
                f.annee_sortie,
                sa.nom AS salle_nom
            FROM seances s
            INNER JOIN films f ON s.film_id = f.id
            INNER JOIN salles sa ON s.salle_id = sa.id
            ORDER BY f.annee_sortie DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getSeanceById($id) {
        $stmt = $this->db->prepare("
        SELECT s.*, f.titre AS film_titre
            FROM seances s
            INNER JOIN films f ON s.film_id = s.id
            WHERE s.id = :id
            ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSeance($data) {

        $stmt = $this->db->prepare("
        INSERT INTO seances (film_id, salle_id, date_heure, created_by) 
        VALUES (:film_id, :salle_id, :date_heure, :created_by)
        ");

        $stmt->execute([
        ':film_id' => $data['film_id'],
        ':salle_id' => $data['salle_id'],
        ':date_heure' => $data['date_heure'],
        ':created_by' => $data['created_by']
        ]);
        return $this->db->lastInsertId();
    }
    public function updateSeance($id, $data) {
  
        $stmt = $this->db->prepare("  UPDATE seance
            SET film_id = :film_id,
                salle_id = :salle_id,
                date_heure = :date_heure,
                created_by = :created_by,
            WHERE id = :id
        ");

        return $stmt->execute([
        ':film_id' => $data['film_id'],
        ':salle_id' => $data['salle_id'],
        ':date_heure'     => $data['date_heure'],
        ':created_by' => $data['created_by'],
        ':id' => $id
        ]);
    }
    public function deleteSeance($id) {
        $stmt = $this->db->prepare("DELETE FROM seance WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
   

}
?>