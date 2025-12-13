<?php
require_once '../app/models/User.php';


class UserController {

    private $userModel;

    public function __construct($db) {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->userModel = new User($db);
    }

    public function handle($get) {

        $action = $get['action'] ?? 'liste_utilisateurs';

        switch ($action) {

            case 'dashboard':
                $this->dashboard();
                break;

            case 'liste_utilisateurs':
                $this->liste_users();
                break;

            case 'show_user':
                if (!isset($get['id'])) die("ID du user manquant");
                $this->showUser($get['id']);
                break;

            case 'add_user':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->addUser($_POST);
                } else {
                    $this->addUserForm();
                }
                break;

            case 'edit_user':
                if (!isset($get['id'])) die("ID manquant");
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->updateUser($get['id'], $_POST);
                } else {
                    $this->editUserForm($get['id']);
                }
                break;
            case 'delete_user':
                if (!isset($get['id'])) die("ID manquant");
                $this->deleteUser($get['id']);
                break;

            default:
                http_response_code(404);
                require '../app/views/404.php';
                break;
        }
    }

public function dashboard() {
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $user = $this->userModel->getAllUsers();
    $nbSutilisateurs = count($user);


    require '../app/views/admin_dashboard.php';
}



    public function liste_users() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $users = $this->userModel->getAllUsers();
        require '../app/views/liste_utilisateurs.php';
    }


    public function showUser($id) {
        $user = $this->userModel->getUserById($id);

        if (!$user) {
            http_response_code(404);
            require '../app/views/404.php';
            return;
        }

        require '../app/views/user_details.php';
    }


    public function addUserForm() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        require '../app/views/utilisateur_form.php';
    }

    public function addUser($post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->userModel->addUser($post);
        header("Location: index.php?action=liste_utilisteurs");
        exit;
    }


    public function editUserForm($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $user = $this->userModel->getUserById($id);
        require '../app/views/utilisateur_form.php';
    }

    public function updateUser($id, $post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->userModel->updateUser($id, $post);
        header("Location: index.php?action=liste_utilisateurs");
        exit;
    }
    public function deleteUser($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->userModel->deleteUser($id);

        header("Location: index.php?action=liste_utilisateurs");
        exit;
    }
}
?>
