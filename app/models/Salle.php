<?php

class Salle {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTypesSalle() {
        return [
            'classique' => 'Classique',
            'imax'      => 'IMAX',
            '3d_dbox'   => '3D D-BOX'
        ];
    }

    public function getAllSalles() {
        $stmt = $this->db->query("
            SELECT * FROM salles
            ORDER BY nom ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalleById($id) {
        $stmt = $this->db->prepare("
            SELECT * FROM salles
            WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addSalle($data) {

        $types = $this->getTypesSalle();

        if (!isset($types[$data['type']])) {
            return false;
        }

        $stmt = $this->db->prepare("
            INSERT INTO salles (nom, capacite, type, created_by)
            VALUES (:nom, :capacite, :type, :created_by)
        ");

        return $stmt->execute([
            ':nom'      => $data['nom'],
            ':capacite' => (int) $data['capacite'],
            ':type'     => $data['type'],
            ':created_by'     => $data['created_by'],
        ]);
    }

    public function updateSalle($id, $data) {

        $types = $this->getTypesSalle();

        if (!isset($types[$data['type']])) {
            return false;
        }

        $stmt = $this->db->prepare("
            UPDATE salles
            SET nom = :nom,
                capacite = :capacite,
                type = :type
            WHERE id = :id
        ");

        return $stmt->execute([
            ':nom'      => $data['nom'],
            ':capacite' => (int) $data['capacite'],
            ':type'     => $data['type'],
            ':id'       => $id
        ]);
    }

    public function deleteSalle($id) {
        $stmt = $this->db->prepare("
            DELETE FROM salles
            WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }
}
