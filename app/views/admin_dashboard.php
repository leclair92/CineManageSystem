<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0">Dashboard Admin</h1>
            <table border="1" class="mb-3">
                <tr>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Genre</th>
                    <th class="text-end" style="max-width:100px;">Actions</th>
                </tr>

                <?php foreach ($films as $film) : ?>
                    <tr>
                        <td><span class="fw-bold"><?= htmlspecialchars($film['titre']) ?></span></td>
                         <td><?= htmlspecialchars($film['annee_sortie']) ?></td>
                         <td><?= htmlspecialchars($film['genre']) ?></td>
                        <td class="text-end">
                            <a href="?action=dashboard?page=edit_film&id=<?= $film['id'] ?>"><i class="bi bi-pencil-square" style="font-size: 1.3rem;"></i></a>
                            &nbsp;<a href="?action=dashboard?page=delete_film&id=<?= $film['id'] ?>"
                            onclick="return confirm('Supprimer ?')"><i class="bi bi-trash3-fill" style="font-size: 1.3rem;"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                 <a href="index.php?page=add_film" class="btn btn-secondary"><i class="bi bi-plus text-primary"s></i> Ajouter un film</a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>
