<?php
require_once '../app/models/Seance.php';
require_once '../app/models/Film.php';
//require_once '../app/models/Salle.php';

class SeanceController {

    private $seanceModel;
    private $filmModel;
    //private $salleModel;

    public function __construct($db) {
       if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->seanceModel = new Seance($db);
        $this->filmModel   = new Film($db);
        //$this->salleModel  = new Salle($db);
    }

    public function handle($get) {

        $action = $get['action'] ?? 'liste_seances';

        switch ($action) {

            case 'dashboard':
                $this->dashboard();
                break;

            case 'liste_seances':
                $this->liste_seance();
                break;

            case 'show_seance':
                if (!isset($get['id'])) die("ID de la seance manquante");
                $this->showSeance($get['id']);
                break;

            case 'add_seance':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->addSeance($_POST);
                } else {
                    $this->addSeanceForm();
                }
                break;

            case 'edit_seance':
                if (!isset($get['id'])) die("ID manquant");
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->updateSeance($get['id'], $_POST);
                } else {
                    $this->editSeanceForm($get['id']);
                }
                break;
            case 'delete_seance':
                if (!isset($get['id'])) die("ID manquant");
                $this->deleteSeance($get['id']);
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

        $seance = $this->seanceModel->getAllSeances();
        $nbSeance = count($seance);
        require '../app/views/admin_dashboard.php';
    }



    public function liste_seance() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $seances = $this->seanceModel->getAllSeances();
        require '../app/views/liste_seances.php';
    }


    public function showSeance($id) {
        $seance = $this->seanceModel->getSeanceById($id);

        if (!$seance) {
            http_response_code(404);
            require '../app/views/404.php';
            return;
        }

        require '../app/views/seance_details.php';
    }


    public function addSeanceForm() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
        
        require '../app/views/seance_form.php';
    }

    public function addSeance($post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->seanceModel->addSeance($post);
        header("Location: index.php?action=liste_seances");
        exit;
    }


    public function editSeanceForm($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $seance = $this->seanceModel->getSeanceById($id);
        require '../app/views/seance_form.php';
    }

    public function updateSeance($id, $post) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->seanceModel->updateSeance($id, $post);
        header("Location: index.php?action=liste_seances");
        exit;
    }
    public function deleteSeance($id) {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $this->seanceModel->deleteSeance($id);

        header("Location: index.php?action=liste_seances");
        exit;
    }
}
?>
