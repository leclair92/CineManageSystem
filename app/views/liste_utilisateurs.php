<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0">Utilisateurs</h1>
            <table border="1" class="mb-3">
                <tr>
                    <th>Nom Utilisateur</th>
                    <th class="text-end" style="max-width:100px;">Actions</th>
                </tr>

                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><span class="fw-bold"><?= htmlspecialchars($user['nom_utilisateur']) ?></span></td>
                        
                        <td class="text-end">
                            <a href="?action=edit_user&id=<?= $user['id'] ?>"><i class="bi bi-pencil-square" style="font-size: 1.3rem;"></i></a>
                            &nbsp;<a href="?action=delete_user&id=<?= $user['id'] ?>"
                            onclick="return confirm('Supprimer ?')"><i class="bi bi-trash3-fill" style="font-size: 1.3rem;"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
                 <a href="index.php?action=add_user" class="btn btn-secondary"><i class="bi bi-plus text-primary"></i> Ajouter un utilisateur</a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>
