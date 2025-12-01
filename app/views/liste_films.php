<?php require __DIR__ . '/layouts/header.php'; ?>

<div class="dashboard-layout">
    <div class="dashboard-content">

        <h1>Liste des films</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Réalisateur</th>
                    <th>Genre</th>
                    <th>Année</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($films)): ?>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td><?= htmlspecialchars($film['titre']) ?></td>
                        <td><?= htmlspecialchars($film['realisateur']) ?></td>
                        <td><?= htmlspecialchars($film['genre_nom']) ?></td>
                        <td><?= htmlspecialchars($film['annee_sortie']) ?></td>

                        <td>
                            <a href="index.php?action=edit_film&id=<?= $film['id'] ?>">Modifier</a>
                            |
                            <a href="index.php?action=delete_film&id=<?= $film['id'] ?>"
                               onclick="return confirm('Êtes-vous sûre de vouloir supprimer ce film ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun film trouvé.</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
        <a href="index.php?action=add_film" class="btn-add">+ Ajouter un film</a>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>