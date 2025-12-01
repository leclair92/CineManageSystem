<?php require __DIR__ . '/layouts/header.php'; ?>

<a href="<?php echo BASE_URL; ?>index.php?action=accueil">⬅ Retour</a> <br> 
<br>
<h2><?= htmlspecialchars($film['titre']) ?></h2>
<p><strong>Réalisateur :</strong> <?= htmlspecialchars($film['realisateur']) ?></p>
<p><strong>Genre :</strong> <?= htmlspecialchars($film['genre_nom']) ?></p>
<p><strong>Année :</strong> <?= htmlspecialchars($film['annee_sortie']) ?></p>
<p><strong>Description:</strong>
<?= htmlspecialchars($film['description']) ?></p>

<?php require __DIR__ . '/layouts/footer.php'; ?>
