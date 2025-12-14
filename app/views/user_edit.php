<?php require __DIR__ . '/layouts/header.php'; ?>

<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">

        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0 mb-3">Modifier un utilisateur</h1>

                    <form action="index.php?action=user_edit&id=<?= $user['id'] ?>" method="post" class="row g-3">

                        <div class="">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control m-0"
                                   value="<?= htmlspecialchars($user['nom']) ?>" required>
                        </div>

                        <div class="">
                            <label for="courriel" class="form-label">Courriel</label>
                            <input type="email" name="courriel" id="courriel" class="form-control m-0"
                                   value="<?= htmlspecialchars($user['courriel']) ?>" required>
                        </div>

                        <div class="">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-select">
                                <option value="user"  <?= $user['role'] === 'user'  ? 'selected' : '' ?>>Utilisateur</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrateur</option>
                            </select>
                        </div>

                    <button type="submit" class="btn btn-secondary">
                    <i class='bi bi-floppy2-fill text-primary'></i> Enregistrer les changements
                    </button>
                       
                    </form>

     
        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>
