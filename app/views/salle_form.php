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

                <div class="row align-items-center mb-3">
                    <div class="col-lg-6"> <a class="h6" href="?action=liste_salles"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a></div>
                    <?php if (isset($salle['id'])): ?>
                        <div class="col-lg-6 text-end"> <a class="h6" href="?action=delete_salle&id=<?= $salle['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette salle ?')"><i class="bi bi-trash3-fill"></i> Supprimer</a></div>
                    <?php endif; ?>
                </div>

                <h1><?= isset($salle) ? '' . htmlspecialchars($salle['nom']) . '' : "Ajouter une salle" ?></h1>

                <form method="POST" enctype="multipart/form-data">
                    <label>Nom :</label>
                    <input type="text" name="nom"
                        value="<?= isset($salle['nom']) ? htmlspecialchars($salle['nom']) : '' ?>"
                        required><br>

                    <label>Capacité :</label> <input type="number" name="capacite"
                        value="<?= isset($salle['capacite']) ? htmlspecialchars($salle['capacite']) : '' ?>"
                        required><br>
                    <label>Type :</label><br>

                    <select name="type" class="form-select" required>
                        <option value="">Sélectionner un type</option>

                        <option value="classique"
                            <?= (isset($salle['type']) && $salle['type'] === 'classique') ? 'selected' : '' ?>>
                            Classique
                        </option>

                        <option value="imax"
                            <?= (isset($salle['type']) && $salle['type'] === 'imax') ? 'selected' : '' ?>>
                            IMAX
                        </option>

                        <option value="3d_dbox"
                            <?= (isset($salle['type']) && $salle['type'] === '3d_dbox') ? 'selected' : '' ?>>
                            3D D-BOX
                        </option>
                    </select>
                    <br>
                    <button type="submit" class="btn btn-secondary">
                        <?= isset($salle) ? "<i class='bi bi-floppy2-fill text-primary'></i> Enregistrer les changements" : "<i class='bi bi-plus text-primary'></i>  Ajouter la salle" ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>