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
                <a href="?action=liste_salles"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a>

                <h1><?= isset($film) ? "Modifier la salle" : "Ajouter une salle" ?></h1>

                <form method="POST" enctype="multipart/form-data">

                    <label>Nom :</label>
                    <input type="text" name="nom"
                        value="<?= isset($salle['nom']) ? htmlspecialchars($salle['nom']) : '' ?>"
                        required><br>

                    <label>Capacite :</label>
                    <input type="number" name="capacite"
                        value="<?= isset($salle['capacite']) ? htmlspecialchars($salle['capacite']) : '' ?>"
                        required><br>

                    <label>Type :</label><br>
                        <input type="text" name="type"
                        value="<?= isset($salle['type']) ? htmlspecialchars($salle['type']) : '' ?>"><br>
                    <br>
                   
                   
                    <br>

                    <button type="submit" class="btn btn-primary">
                        <?= isset($salle) ? "Enregistrer les changements" : "Ajouter la salle" ?>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>