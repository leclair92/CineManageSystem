<?php

require_once '../app/models/User.php';

class UsersController {

    private $userModel;

    public function __construct($db) {
        
        $this->userModel = new User($db);
    }
public function handle($params) {

    $action = $params['action'] ?? 'users';

    switch ($action) {

        case 'users':
            $this->index();
            break;

        case 'user_create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->store($_POST);
            } else {
                $this->createForm();
            }
            break;

        case 'user_edit':
            if (!isset($params['id'])) {
                die("ID utilisateur manquant");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->update((int)$params['id'], $_POST);
            } else {
                $this->editForm((int)$params['id']);
            }
            break;

        case 'user_delete':
            if (isset($params['id'])) {
                $this->delete((int)$params['id']);
            }
            break;

        case 'inscription':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->inscriptionUser($_POST);
            } else {
                $this->inscriptionForm();
            }
            break;

        default:
            http_response_code(404);
            require '../app/views/404.php';
    }
}

    public function index() {
        $users = $this->userModel->getAllUsers();
        require '../app/views/users.php';
    }

    public function createForm() {
        require '../app/views/user_create.php';
    }

    public function store($post) {

        $data = [
            'nom'     => trim($post['nom']),
            'courriel'    => trim($post['courriel']),
            'password' => trim($post['password']),
            'role'     => $post['role'] ?? 'user'
        ];

        $this->userModel->addUser($data);

        header('Location: index.php?action=users');
        exit;
    }

    public function editForm($id) {
        $user = $this->userModel->getUserById($id);
        require '../app/views/user_edit.php';
    }

    public function update($id, $post) {

        $data = [
            'nom'  => trim($post['nom']),
            'courriel' => trim($post['courriel']),
            'role'  => $post['role']
        ];

        $this->userModel->updateUser($id, $data);

        header('Location: index.php?action=users');
        exit;
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: index.php?action=users');
        exit;
    }


    public function inscriptionForm() {
        require '../app/views/inscription.php';
    }
public function inscriptionUser($post) {

    $nom      = trim($post['nom'] ?? '');
    $courriel = trim($post['courriel'] ?? '');
    $password = trim($post['password'] ?? '');

    if ($nom === '' || $courriel === '' || $password === '') {
        $error = "Tous les champs sont obligatoires";
        require '../app/views/inscription.php';
        return;
    }

    $data = [
        'nom'      => $nom,
        'courriel' => $courriel,
        'password' => $password,
        'role'     => 'user'
    ];

    $this->userModel->addUser($data);

    header('Location: index.php?action=login');
    exit;
}

}
