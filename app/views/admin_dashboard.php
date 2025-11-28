<?php require __DIR__ . '/layouts/header.php'; ?>

<h2>Dashboard Admin</h2>

<a href="index.php?page=add_film">Ajouter un film</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($films as $film) : ?>
        <tr>
            <td><?= $film['id'] ?></td>
            <td><?= htmlspecialchars($film['titre']) ?></td>
            <td>
                <a href="index.php?page=edit_film&id=<?= $film['id'] ?>">Modifier</a> |
                <a href="index.php?page=delete_film&id=<?= $film['id'] ?>"
                   onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<a href="index.php?action=logout">Déconnexion</a>

<?php require __DIR__ . '/layouts/footer.php'; ?>
