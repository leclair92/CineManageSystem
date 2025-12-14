<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0">Salles</h1>
            <table border="1" class="mb-3">
                <tr>
                    <th>Nom</th>
                    <th>Capacité</th>
                    <th>Type</th>
                    <th class="text-end" style="max-width:100px;">Actions</th>
                </tr>

                <?php foreach ($salles as $salle) : ?>
                    <tr>
                        <td><a href="?action=edit_salle&id=<?= $salle['id'] ?>" target="_blank"><span class="fw-bold"><?= htmlspecialchars($salle['nom']) ?></span></a></td>
                         <td><?= htmlspecialchars($salle['capacite']) ?></td>
                         <td><?= htmlspecialchars($salle['type']) ?></td>
                        <td class="text-end">
                            <a href="?action=edit_salle&id=<?= $salle['id'] ?>"><i class="bi bi-pencil-square" style="font-size: 1.3rem;"></i></a>
                            &nbsp;<a href="?action=delete_salle&id=<?= $salle['id'] ?>"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette salle ? ?')"><i class="bi bi-trash3-fill" style="font-size: 1.3rem;"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                 <a href="index.php?action=add_salle" class="btn btn-secondary"><i class="bi bi-plus text-primary"></i> Ajouter une salle</a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>
