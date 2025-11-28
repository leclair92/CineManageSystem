<?php require __DIR__ . '/layouts/header.php'; ?>

<h2>Liste des films</h2>

<?php if (!empty($films)) : ?>
    <ul>
        <?php foreach ($films as $film): ?>
            <li>
                <a href="?action=show_film&id=<?= $film['id'] ?>">
                    <?= htmlspecialchars($film['titre']) ?>
                    (<?= htmlspecialchars($film['annee_sortie']) ?>)
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun film trouvé.</p>
<?php endif; ?>

<?php require __DIR__ . '/layouts/footer.php'; ?>




