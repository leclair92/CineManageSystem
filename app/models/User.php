<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;

    public function login($username, $password) {

        $sql = "SELECT * FROM administrateurs WHERE nom_utilisateur = :username AND mot_de_passe = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    }
    
}

?>
