<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em;min-height:500px;">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div>
                <?php if (isset($erreur)) { ?>
                     <p class="alert alert-danger error-message p-2 text-secondary text-center" role="alert"><?= htmlspecialchars($erreur) ?></p>
                <?php } ?>
                      <div class="row align-items-center mb-3">
                    <div class="col-lg-6"> <a class="h6" href="?action=liste_seances"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a></div>
                    <div class="col-lg-6 text-end"> <a class="h6" href="?action=delete_seance&id=<?= isset($seance['id']) ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette séance ?')"><i class="bi bi-trash3-fill"></i> Supprimer</a></div>

                </div>
                <h1><?= isset($seance) ? '' . htmlspecialchars($seance['film_titre']) . '' : "Ajouter une séance" ?></h1>
               
          <form method="POST">
    <div class="mb-3">
        <label for="film_id">Film</label>
        <select id="film_id" name="film_id" class="form-select" required>
            <option value="">Sélectionner un film</option>
            <?php foreach ($films as $film): ?>
                <option value="<?= $film['id'] ?>"
                    <?= (isset($seance) && $seance['film_id'] == $film['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($film['titre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="salle_id">Salle</label>
        <select id="salle_id" name="salle_id" class="form-select" required>
            <option value="">Sélectionner une salle</option>
            <?php foreach ($salles as $salle): ?>
                <option value="<?= $salle['id'] ?>"
                    <?= (isset($seance) && $seance['salle_id'] == $salle['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($salle['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label for="date_heure">Date et heure</label>
        <input
            type="datetime-local"
            id="date_heure"
            name="date_heure"
            class="form-control"
            value="<?= isset($seance['date_heure']) ? date('Y-m-d\TH:i', strtotime($seance['date_heure'])) : '' ?>"
            required
        >
    </div>

    <button type="submit" class="btn btn-secondary">
        <?= isset($seance)
            ? "<i class='bi bi-floppy2-fill text-primary'></i> Enregistrer"
            : "<i class='bi bi-plus text-primary'></i> Ajouter la séance"
        ?>
    </button>
</form>

            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>