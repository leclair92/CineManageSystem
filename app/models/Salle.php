<?php
class Salle {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllSalles() {
        $stmt = $this->db->query("SELECT * FROM salles
                ORDER BY salles.nom DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalleById($id) {
        $stmt = $this->db->prepare(" SELECT * FROM salles WHERE salles.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSalle($data) {
        $stmt = $this->db->prepare("
        INSERT INTO salles (nom, capacite, type) 
        VALUES (:nom, :capacite, :type)
        ");

        $stmt->execute([
        ':nom' => $data['nom'],
        ':capacite' => $data['capacite'],
        ':type' => $data['type'],
        ]);
        return $this->db->lastInsertId();
    }
    public function updateSalle($id, $data) {
  
        $stmt = $this->db->prepare("  UPDATE salles
            SET nom = :nom,
                capacite = :capacite,
                type = :type,
            WHERE id = :id
        ");

        return $stmt->execute([
        ':nom' => $data['nom'],
        ':capacite' => $data['capacite'],
        ':type'     => $data['type'],
        ':id' => $id
        ]);
    }
    public function deleteSalle($id) {
        $stmt = $this->db->prepare("DELETE FROM salles WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
  
    
}
?>