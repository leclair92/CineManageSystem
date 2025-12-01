<?php
require_once('../app/models/User.php');

class AuthController {
    private $db;
    private $userModel;

   // changement 1
   public function __construct($db) {
        // Démarrer la session une seule fois ici
        if (session_status() === PHP_SESSION_NONE) {//retourne etat de la session
            session_start();
        }

        $this->db = $db; //garde conexion
        $this->userModel = new User($db);
    }

    public function handle($params) {
        $action = $params['action'] ?? '';

        if ($action === 'logout') {
            $this->logout();
        } // changement 2  // Récupérer un éventuel message d’erreur de la session
         else {
            $error = $_SESSION['login_error'] ?? null;
            unset($_SESSION['login_error']);
            require '../app/views/login.php';
        }
    }

    public function handlePost($params, $postData) {
        $username = trim($postData['username'] ?? '');
        $password = trim($postData['password'] ?? '');
//cHANGEMENT 3

   if ($username === '' || $password === '') {
            $_SESSION['login_error'] = "Veuillez remplir tous les champs.";
            header('Location: index.php?action=login');
            exit;
        }
        //cHANGEMENT 4  // On délègue la logique d'authentification au modèle User
        $user = $this->userModel->login($username, $password);

        if ($user) {
            // Connexion OK : on enregistre les infos utiles dans la session
            $_SESSION['user'] = [
                'id'       => $user['id'] ?? null,
                'username' => $user['nom_utilisateur'] ?? $username,
                'role'     => $user['role'] ?? 'admin', // à adapter selon ta BD
            ];
            // Changement 6 inactivité 

            $_SESSION['last_activity'] = time();  // heure actuelle en secondes

            // Redirection après connexion 
            header('Location: index.php?action=dashboard');
            exit;
        } else {
            // Identifiants invalides
            $_SESSION['login_error'] = "Identifiants incorrects";
            header('Location: index.php?action=login');
            exit;
        }
    }
    //Changement 5 
    private function logout() {

        $_SESSION = [];
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
?>

?>