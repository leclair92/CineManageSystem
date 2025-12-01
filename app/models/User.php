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
}
