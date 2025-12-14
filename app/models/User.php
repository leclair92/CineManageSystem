<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getRoles() {
        return [
            'user'  => 'Utilisateur',
            'admin' => 'Administrateur'
        ];
    }

    public function login($nom, $password) {

    $stmt = $this->db->prepare("
        SELECT * FROM users WHERE nom = :nom
    ");

    $stmt->execute([
        ':nom' => $nom
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}


    public function getAllUsers() {
        $stmt = $this->db->query("
            SELECT * FROM users ORDER BY id DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("
            SELECT * FROM users WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($data) {

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("
            INSERT INTO users (nom, courriel, password, role)
            VALUES (:nom, :courriel, :password, :role)
        ");

        return $stmt->execute([
            ':nom'      => $data['nom'],
            ':courriel' => $data['courriel'],
            ':password' => $password,
            ':role'     => $data['role']
        ]);
    }

public function updateUser($id, $data) {

    $stmt = $this->db->prepare("
        UPDATE users
        SET nom = :nom,
            courriel = :courriel,
            role = :role
        WHERE id = :id
    ");

    return $stmt->execute([
        ':nom'      => $data['nom'],
        ':courriel' => $data['courriel'],
        ':role'     => $data['role'],
        ':id'       => $id
    ]);
}

    public function updatePassword($id, $password) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("
            UPDATE users  SET password = :password  WHERE id = :id
        ");

        return $stmt->execute([
            ':password' => $hash,
            ':id'       => $id
        ]);
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("
            DELETE FROM users WHERE id = :id
        ");
        return $stmt->execute([':id' => $id]);
    }
}
