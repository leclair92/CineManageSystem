<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div>
                <?php if (isset($erreur)) { ?>
                     <p class="alert alert-danger error-message p-2 text-secondary text-center" role="alert"><?= htmlspecialchars($erreur) ?></div>
                <?php } ?>
                <a href="?action=liste_seances"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a>
                <h1><?= isset($seance) ? "Modifier la séance" : "Ajouter une séance" ?></h1>

                <form method="POST" enctype="multipart/form-data">
                    <label>Film :</label><br>
                    <select name="film_id" class="form-select" required>
                        <option value="">-- Sélectionner un film --</option>
                        <?php foreach ($films as $f): ?>
                            <option value="<?= $f['id'] ?>"
                                <?= (isset($film['genre_id']) && $film['genre_id'] == $f['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($f['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label>Salle :</label><br>
                    <select name="salle_id" class="form-select" required>
                        <option value="">-- Sélectionner une Salle --</option>
                        <?php foreach ($salles as $salle): ?>
                            <option value="<?= $s['id'] ?>"
                                <?= (isset($salle['nom']) && $salle['id'] == $s['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($s['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    
                    <label>Date :</label>
                    <input type="date" name="date"
                        value="<?= isset($seance['date']) ? htmlspecialchars($seance['date']) : '' ?>"
                        required><br>
      
                    <button type="submit" class="btn btn-primary">
                        <?= isset($seance) ? "Enregistrer les changements" : "Ajouter la séance" ?>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>