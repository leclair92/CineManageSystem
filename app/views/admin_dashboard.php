<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - CineGest</title>
</head>
<body>

<header class="top-header">
    <div class="logo">
        
    </div>

    <nav class="top-nav">
        <a href="#">Films à l'affiche</a>
        <a href="#">Billetterie</a>
        <a href="#">Contact</a>
        <span class="user">
            <strong>Amélie</strong>
        </span>
        <p><?php echo date('D') . ' ' . date('M') . ' ' . date('Y'); ?></p>
        <a href="index.php?action=logout" class="logout-btn">Déconnexion</a>
    </nav>
</header>

<div class="dashboard-container">

    <aside class="sidebar">
        <h3>Tableau de bord</h3>

        <ul class="menu">
            <li><a href="index.php?action=liste_films">Films</a></li>
            <li><a href="#">Salles</a></li>
            <li><a href="#">Séances</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="#">Réglages</a></li>
        </ul>

        <div class="sidebar-footer">
            <a href="index.php?action=logout" class="logout-btn">Déconnexion</a>
        </div>
    </aside>

</div>

</body>
</html>

