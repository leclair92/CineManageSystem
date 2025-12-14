<?php

require_once __DIR__ . '/../models/User.php';

class UsersController {
    private User $userModel;

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
                $this->create();
                break;

            case 'user_edit':
                if (isset($params['id'])) {
                    $this->edit((int)$params['id']);
                }
                break;

            case 'user_delete':
                if (isset($params['id'])) {
                    $this->delete((int)$params['id']);
                }
                break;

            default:
                http_response_code(404);
                require __DIR__ . '/../views/404.php';
                break;
        }
    }

    public function handlePost($params, $post) {
        $action = $params['action'] ?? '';

        switch ($action) {
            case 'user_create':
                $this->store($post);                 // créer un user
                break;

            case 'user_edit':
                if (isset($params['id'])) {
                    $this->update((int)$params['id'], $post); // modifier un user
                }
                break;

            
        }
    }



    // Liste des users
    public function index() {
        $users = $this->userModel->getAllUsers();
        // on pointe sur views/users.php (pas de sous-dossier)
        require __DIR__ . '/../views/users.php';
    }

    // Formulaire d’ajout
    public function create() {
        require __DIR__ . '/../views/user_create.php';
    }

    // Enregistrer un nouvel user
    public function store($post) {
        $nom = trim($post['nom']);
        $courriel = trim($post['courriel']);
        $password = trim($post['password']);
        $role = $post['role'] ?? 'user';

        $this->userModel->createUser($nom, $courriel, $password, $role);

        header('Location: index.php?action=users');
        exit;
    }

    // Formulaire de modif
    public function edit($id) {
        $user = $this->userModel->getUserById($id);
        require __DIR__ . '/../views/user_edit.php';
    }

    // Sauvegarder la modif
    public function update($id, $post) {
        $nom = trim($post['nom']);
        $courriel = trim($post['courriel']);
        $role = $post['role'];

        $this->userModel->updateUser($id, $nom, $courriel, $role);

        header('Location: index.php?action=users');
        exit;
    }

    // Supprimer
    public function delete($id) {
        $this->userModel->deleteUser($id);

        header('Location: index.php?action=users');
        exit;
    }
}
