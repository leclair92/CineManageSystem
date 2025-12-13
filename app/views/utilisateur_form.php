<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div>
                <?php if (isset($erreur)) { ?>
                    <p class="alert alert-danger error-message p-2 text-secondary text-center" role="alert"><?= htmlspecialchars($erreur) ?></p>
                <?php } ?>
                <a href="?action=liste_utilisateurs"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a>

                <h1><?= isset($user) ? "Modifier cet utilisateur" : "Ajouter un utilisteur" ?></h1>

                <form method="POST" enctype="multipart/form-data">

                    <label>Nom d'utilisateur :</label>
                    <input type="text" name="nom_utilisateur"
                        value="<?= isset($user['nom_utilisateur']) ? htmlspecialchars($user['nom_utilisateur']) : '' ?>"
                        required><br>

                    <label>Mot de passe :</label>
                    <input type="password" name="mot_de_passe"
                        value="<?= isset($user['mot_de_passe']) ? htmlspecialchars($user['mot_de_passe']) : '' ?>"
                        required><br>
                    <button type="submit" class="btn btn-primary">
                        <?= isset($user) ? "Enregistrer les changements" : "Ajouter l'utilisateur'" ?>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>