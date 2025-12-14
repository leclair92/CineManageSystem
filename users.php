<?php require __DIR__ . '/layouts/header.php'; ?>

<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        
        <!-- MENU À GAUCHE -->
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <!-- CONTENU À DROITE -->
        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0 mb-4">Gestion des utilisateurs</h1>

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h2 class="h5 m-0">Liste des utilisateurs</h2>
                        <a href="index.php?action=user_create" class="btn btn-primary">
                            Ajouter un utilisateur
                        </a>
                    </div>

                    <?php if (!empty($users)) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Courriel</th>
                                        <th>Rôle</th>
                                        <th>Créé le</th>
                                        <th style="width: 160px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']) ?></td>
                                        <td><?= htmlspecialchars($user['nom']) ?></td>
                                        <td><?= htmlspecialchars($user['courriel']) ?></td>
                                        <td><?= htmlspecialchars($user['role']) ?></td>
                                        <td><?= htmlspecialchars($user['created_at']) ?></td>
                                        <td>
                                            <a href="index.php?action=user_edit&id=<?= $user['id'] ?>"
                                               class="btn btn-warning btn-sm me-1">
                                                Modifier
                                            </a>
                                            <a href="index.php?action=user_delete&id=<?= $user['id'] ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Supprimer cet utilisateur ?');">
                                                Supprimer
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p class="mb-0">Aucun utilisateur trouvé.</p>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>
