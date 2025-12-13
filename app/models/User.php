<?php

class User {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Authentifie un utilisateur admin à partir de son nom et mot de passe.
     * Retourne le tableau $user si OK, ou false si échec.
     */
    public function login(string $username, string $password) {
        // On cherche l'utilisateur dans la table administrateurs
        $sql = "SELECT * FROM administrateurs WHERE nom_utilisateur = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si on a trouvé un utilisateur avec un mot de passe
        if ($user && isset($user['mot_de_passe'])) {
            // Vérifier le mot de passe fourni avec le hash en BD
            if (password_verify($password, $user['mot_de_passe'])) {
                // Succès : on retourne toutes les infos de l'utilisateur
                return $user;
            }
        }

        // Échec de l'authentification
        return false;
    }

      public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM administrateurs 
             ORDER BY nom_utilisateur DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("  
        SELECT * FROM users
            WHERE users.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($data) {
        $stmt = $this->db->prepare("
        INSERT INTO users (nom_utilisateur, mot_de_passe)
        ");

        $stmt->execute([
        ':nom_utilisateur' => $data['nom_utilisateur'],
        ':mot_de_passe' => $data['mot_de_passe'],
        ]);
        return $this->db->lastInsertId();
    }
    public function updateUser($id, $data) {
  
        $stmt = $this->db->prepare("  
        UPDATE users
            SET nom_utilisateur = :nom_utilisateur,
                mot_de_passe = :mot_de_passe,
            WHERE id = :id
        ");

        return $stmt->execute([
        ':nom_utilisateur' => $data['nom_utilisateur'],
        ':mot_de_passe' => $data['mot_de_passe'],
        ':id' => $id
        ]);
    }
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
   
}
