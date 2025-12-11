<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div>
                <?php if (isset($erreur)) { ?>
                    <div style="color:red"><?= htmlspecialchars($erreur) ?></div>
                <?php } ?>

                <h1><?= isset($film) ? "Modifier le film" : "Ajouter un film" ?></h1>

                <form method="POST" enctype="multipart/form-data">

                    <label>Titre :</label>
                    <input type="text" name="titre"
                        value="<?= isset($film['titre']) ? htmlspecialchars($film['titre']) : '' ?>"
                        required><br>

                    <label>Réalisateur :</label>
                    <input type="text" name="realisateur"
                        value="<?= isset($film['realisateur']) ? htmlspecialchars($film['realisateur']) : '' ?>"
                        required><br>

                    <label>Genre :</label><br>
                    <select name="genre_id" class="form-select" required>
                        <option value="">-- Sélectionner un genre --</option>
                        <?php foreach ($genres as $g): ?>
                            <option value="<?= $g['id'] ?>"
                                <?= (isset($film['genre_id']) && $film['genre_id'] == $g['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($g['nom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label>Année de sortie :</label>
                    <input type="number" name="annee_sortie"
                        value="<?= isset($film['annee_sortie']) ? $film['annee_sortie'] : '' ?>"
                        required><br>

                    <label>Description :</label>
                    <textarea name="description" rows="4"><?= isset($film['description']) ? htmlspecialchars($film['description']) : '' ?></textarea><br>
     
            <label>Affiche du film :</label>
            <input type="file" name="photo" accept="image/*"><br>

            <?php if (isset($film['affiche_film']) && $film['affiche_film'] != ''): ?>
                <img src="uploads/<?= htmlspecialchars($film['affiche_film']) ?>" width="100">
                <input type="hidden" name="ancienne_photo" value="<?= htmlspecialchars($film['affiche_film']) ?>">
            <?php endif; ?>
        
                    <br>

                    <button type="submit" class="btn btn-primary">
                        <?= isset($film) ? "Enregistrer les changements" : "Ajouter le film" ?>
                    </button>

                </form>

            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>