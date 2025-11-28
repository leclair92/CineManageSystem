<?php
require_once('../app/models/User.php');

class AuthController {
    private $db;
    private $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);
    }

    public function handle($params) {
        $action = $params['action'] ?? '';

        if ($action === 'logout') {
            $this->logout();
        } else {
            $error = $_SESSION['login_error'] ?? null;
            unset($_SESSION['login_error']);
            require '../app/views/login.php';
        }
    }

    public function handlePost($params, $postData) {
        $username = trim($postData['username'] ?? '');
        $password = trim($postData['password'] ?? '');

        if ($username !== '' && $password !== '') {
            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['admin'] = $user['nom_utilisateur'];
                header('Location: index.php?action=dashboard'); // redirection vers liste des films
                exit;
            } else {
                $_SESSION['login_error'] = "Identifiants incorrects";
                header('Location: index.php?action=login');
                exit;
            }
        } else {
            $_SESSION['login_error'] = "Veuillez remplir tous les champs.";
            header('Location: index.php?action=login');
            exit;
        }
    }

    private function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
?>