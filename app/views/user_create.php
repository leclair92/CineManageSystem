<?php require __DIR__ . '/layouts/header.php'; ?>

<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em;min-height:500px;">
        
        <!-- MENU -->
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <!-- CONTENU -->
        <div class="col-lg-9 p-4 admin-dash">
            <div>

                <?php if (isset($erreur)) : ?>
                    <p class="alert alert-danger text-center">
                        <?= htmlspecialchars($erreur) ?>
                    </p>
                <?php endif; ?>

                <div class="row align-items-center mb-3">
                    <div class="col-lg-6">
                        <a class="h6" href="index.php?action=users">
                            <i class="bi bi-arrow-left-circle-fill"></i> Retour
                        </a>
                    </div>
                </div>

                <h1>
                    <?= isset($user) ? 'Modifier un utilisateur' : 'Ajouter un utilisateur' ?>
                </h1>

                <form method="POST" autocomplete="off">

                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input
                            type="text"
                            id="nom"
                            name="nom"
                            class="form-control"
                            value="<?= isset($user['nom']) ? htmlspecialchars($user['nom']) : '' ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="courriel">Courriel</label>
                        <input
                            type="email"
                            id="courriel"
                            name="courriel"
                            class="form-control"
                            value="<?= isset($user['courriel']) ? htmlspecialchars($user['courriel']) : '' ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password">
                            Mot de passe
                            <?= isset($user) ? '(laisser vide pour ne pas changer)' : '' ?>
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            <?= isset($user) ? '' : 'required' ?>
                            autocomplete="new-password"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="role">Rôle</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="user"
                                <?= (isset($user) && $user['role'] === 'user') ? 'selected' : '' ?>>
                                Utilisateur
                            </option>
                            <option value="admin"
                                <?= (isset($user) && $user['role'] === 'admin') ? 'selected' : '' ?>>
                                Administrateur
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-secondary">
                        <?= isset($user)
                            ? "<i class='bi bi-floppy2-fill text-primary'></i> Enregistrer les changements"
                            : "<i class='bi bi-plus text-primary'></i> Ajouter l'utilisateur"
                        ?>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>
