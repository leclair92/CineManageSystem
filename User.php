<?php

class User {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /* -------- AUTHENTIFICATION ADMIN (table administrateurs) -------- */

    public function login(string $username, string $password) {
        $sql = "SELECT * FROM administrateurs WHERE nom_utilisateur = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si on a trouvé un utilisateur ET qu'il a un mot de passe
        if ($user && isset($user['mot_de_passe'])) {

            // Vérifier le mot de passe fourni avec le hash en BD
            if (password_verify($password, $user['mot_de_passe'])) {

                // Succès → retourner les infos de l'utilisateur
                return $user;
            }
        }

        // Échec
        return false;
    }

    /* --------- GESTION DE LA TABLE users --------- */

    public function getAllUsers(): array {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id): ?array {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }

    public function createUser(string $nom, string $courriel, string $password, string $role = 'user'): bool {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (nom, courriel, password, role)
                VALUES (:nom, :courriel, :password, :role)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nom' => $nom,
            ':courriel' => $courriel,
            ':password' => $hashedPassword,
            ':role' => $role
        ]);
    }

    public function updateUser(int $id, string $nom, string $courriel, string $role): bool {
        $sql = "UPDATE users 
                SET nom = :nom, courriel = :courriel, role = :role
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nom' => $nom,
            ':courriel' => $courriel,
            ':role' => $role,
            ':id' => $id
        ]);
    }

    public function updatePassword(int $id, string $newPassword): bool {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':password' => $hashedPassword,
            ':id' => $id
        ]);
    }

    public function deleteUser(int $id): bool {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}
