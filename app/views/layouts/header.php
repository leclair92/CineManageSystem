<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineGest</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo BASE_URL; ?>images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>images/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="CineGest" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <!-- Custom script -->
    <script src="<?php echo BASE_URL; ?>js/script.js"></script>
    <!-- icon font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Font --> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="shadow mb-0 p-0" data-bs-theme="light"> 
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">

      <a href="?action=accueil" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none"> 
        <img src="<?php echo BASE_URL; ?>/images/logo.jpg" width="150"> </a> 


        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navMenu"
                aria-controls="navMenu" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center"> 
                    <li class="nav-item"><a href="?action=accueil" class="nav-link active" aria-current="page">Films à l'affiche</a></li> 
                    
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item"><a href="?action=dashboard" class="fw-bold text-uppercase p-2"><i class="bi bi-person-fill"></i><?= htmlspecialchars($_SESSION['user']['username']) ?></a></li> 
                        <li class="nav-item"><a class="btn btn-primary w-100" href="index.php?action=logout">Déconnexion</a></li> 
                    <?php else: ?>
                        <li class="nav-item"><a href="?action=inscription" type="button" class="btn btn-outline-secondary me-2">Inscription</a></li>
                        <li class="nav-item"><a href="?action=login" type="button" class="btn btn-primary">Connexion</a></li> 
                    <?php endif; ?>
                </ul> 
        </div>
  </div>
</nav>
</header>
<?php
function requiredMark(bool $isRequired): string {
    return $isRequired ? ' <span class="required">*</span>' : '';
}
?>
