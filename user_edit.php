<?php require __DIR__ . '/layouts/header.php'; ?>

<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">

        <!-- MENU À GAUCHE -->
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <!-- CONTENU À DROITE -->
        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0 mb-4">Modifier un utilisateur</h1>

            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <form action="index.php?action=user_edit&id=<?= $user['id'] ?>" method="post" class="row g-3">

                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control"
                                   value="<?= htmlspecialchars($user['nom']) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="courriel" class="form-label">Courriel</label>
                            <input type="email" name="courriel" id="courriel" class="form-control"
                                   value="<?= htmlspecialchars($user['courriel']) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-select">
                                <option value="user"  <?= $user['role'] === 'user'  ? 'selected' : '' ?>>Utilisateur</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrateur</option>
                            </select>
                        </div>

                        <div class="col-12 d-flex justify-content-between mt-3">
                            <a href="index.php?action=users" class="btn btn-outline-secondary">
                                Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>
