<?php
require_once('../app/models/User.php');

class AuthController {

    private User $userModel;

    public function __construct($db) {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->userModel = new User($db);
    }

    public function handle($params) {

        $action = $params['action'] ?? 'login';
        
        if ($action === 'logout') {
            $this->logout();
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->login($_POST);
            return;
        }

        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        require '../app/views/login.php';
    }

    private function login($post) {

        $username = trim($post['username'] ?? '');
        $password = trim($post['password'] ?? '');

        if ($username === '' || $password === '') {
            $_SESSION['login_error'] = "Veuillez remplir tous les champs.";
            header('Location: index.php?action=login');
            exit;
        }

        $user = $this->userModel->login($username, $password);

        if ($user) {
            $_SESSION['user'] = [
                'id'   => $user['id'],
                'nom'  => $user['nom'],
                'role' => $user['role'],
            ];

            $_SESSION['last_activity'] = time();

            header('Location: index.php?action=dashboard');
            exit;
        }

        $_SESSION['login_error'] = "Identifiants incorrects";
        header('Location: index.php?action=login');
        exit;
    }

    private function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
