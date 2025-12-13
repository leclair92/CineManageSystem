<?php
require_once '../app/models/Salle.php';

class SalleController {

    private $salleModel;

    public function __construct($db) {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->salleModel = new Salle($db);
    }

    public function handle($get) {

        $action = $get['action'] ?? 'liste_salle';

        switch ($action) {

            case 'dashboard':
                $this->dashboard();
                break;

            case 'liste_salles':
                $this->liste_salle();
                break;

            case 'show_salle':
                if (!isset($get['id'])) die("ID de la salle manquante");
                $this->showSalle($get['id']);
                break;

            case 'add_salle':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->addSalle($_POST);
                } else {
                    $this->addSalleForm();
                }
                break;

            case 'edit_salle':
                if (!isset($get['id'])) die("ID manquant");
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->updateSalle($get['id'], $_POST);
                } else {
                    $this->editSalleForm($get['id']);
                }
                break;
            case 'delete_salle':
                if (!isset($get['id'])) die("ID manquant");
             $this->deleteSalle($get['id']);
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

        $salle = $this->salleModel->getAllSalles();
        $nbSalle = count($salle);
        require '../app/views/admin_dashboard.php';
    }



    public function liste_salle() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $salles = $this->salleModel->getAllSalles();
        require '../app/views/liste_salles.php';
    }


    public function showSalle($id) {
        $salle = $this->salleModel->getSalleById($id);

        if (!$salle) {
            http_response_code(404);
            require '../app/views/404.php';
            return;
        }

        require '../app/views/salle_details.php';
    }


    public function addSalleForm() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        
        require '../app/views/salle_form.php';
    }

    public function addSalle($post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->salleModel->addSalle($post);
        header("Location: index.php?action=liste_salles");
        exit;
    }


    public function editSalleForm($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $salle = $this->salleModel->getSalleById($id);
        require '../app/views/salle_form.php';
    }

    public function updateSalle($id, $post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->salleModel->updateSalle($id, $post);
        header("Location: index.php?action=liste_salles");
        exit;
    }
    public function deleteSalle($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->salleModel->deleteSalle($id);

        header("Location: index.php?action=liste_salles");
        exit;
    }
}
?>
