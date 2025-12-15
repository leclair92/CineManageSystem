<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div>
                <?php if (!empty($errors)): ?> 
                    <div class="alert alert-danger error-message p-2 text-secondary text-center" role="alert">
                        
                        <?php foreach ($errors as $e): ?>
                            <p class="m-0">
                            <i class="bi bi-exclamation-octagon-fill"></i> <?= htmlspecialchars($e) ?>
                            </p>
                        <?php endforeach; ?>
                        
                    </div>
                <?php endif; ?>
                <div class="row align-items-center mb-3">
                    <div class="col-lg-6"> <a class="h6" href="?action=liste_films"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a></div>
                    <?php if (isset($film['id'])): ?>
                        <div class="col-lg-6 text-end"> <a class="h6"
                        href="?action=delete_film&id=<?= $film['id'] ?>"
                        onclick="return confirm('Voulez-vous vraiment supprimer ce film ?')">
                            <i class="bi bi-trash3-fill"></i> Supprimer
                        </a>     </div>
                    <?php endif; ?>
                </div>
                <h1><?= isset($film) ? '' . htmlspecialchars($film['titre']) . '' : "Ajouter un film" ?></h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <label>Titre :</label>
                    <input type="text" name="titre"
                        value="<?= htmlspecialchars($old['titre'] ?? ($film['titre'] ?? '')) ?>"
                        required><br>

                    <label>Réalisateur :</label>
                    <input type="text" name="realisateur"
                        value="<?= htmlspecialchars($old['realisateur'] ?? ($film['realisateur'] ?? '')) ?>"
                        required><br>

                    <label>Genre :</label><br>
                    <select class="form-select" name="genre_id" required>
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
                        value="<?= htmlspecialchars($old['annee_sortie'] ?? ($film['annee_sortie'] ?? '')) ?>"
                        required><br>

                    <label>Description :</label>
                    <textarea name="description" rows="4"><?= htmlspecialchars($old['description'] ?? ($film['description'] ?? '')) ?></textarea><br>
                      
                        </div>
                        <div class="col-lg-3">
                            <label>Affiche du film :</label>
                            <input type="file" name="photo" accept="image/*"><br>

                            <?php if (!empty($film['affiche_film'])): ?>
                                <?php
                                $afficheUrl = '/CineManageSystem/public/images/' . $film['affiche_film'];
                                ?>
                                <img src="<?= htmlspecialchars($afficheUrl) ?>" width="120" class="img-thumbnail">
                                <input type="hidden" name="ancienne_photo" value="<?= htmlspecialchars($film['affiche_film']) ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                          <button type="submit" class="btn btn-secondary">
                                <?= isset($film) ? "<i class='bi bi-floppy2-fill text-primary'></i> Enregistrer les changements" : "<i class='bi bi-plus text-primary'></i>  Ajouter le film" ?>
                            </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>