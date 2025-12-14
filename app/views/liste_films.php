<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0">Films</h1>
            <table border="1" class="mb-3">
                <tr>
                    <th>Affiche</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Genre</th>
                    <th class="text-end" style="max-width:100px;">Actions</th>
                </tr>

                <?php foreach ($films as $film) : ?>
                    <?php
                    $afficheUrl = !empty($film['affiche_film']) ? '/CineManageSystem/public/images/' . $film['affiche_film']  : '/CineManageSystem/public/images/default.jpg';
                    ?>
                    <tr>
                        <td style="width:90px;">
                            <img src="<?= htmlspecialchars($afficheUrl) ?>"
                                alt="<?= htmlspecialchars($film['titre']) ?>"
                                style="width:70px; height:auto;"
                                class="img-thumbnail">
                        </td>

                        <td><a href="?action=edit_film&id=<?= $film['id'] ?>" target="_blank"><strong><?= htmlspecialchars($film['titre']) ?></a></strong></td>
                        <td><?= htmlspecialchars($film['annee_sortie']) ?></td>
                        <td><?= htmlspecialchars($film['genre_nom']) ?></td>

                        <td class="text-end">
                            <a href="?action=edit_film&id=<?= $film['id'] ?>">
                                <i class="bi bi-pencil-square" style="font-size:1.3rem;"></i>
                            </a>
                            &nbsp;
                            <a href="?action=delete_film&id=<?= $film['id'] ?>"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce film ?')">
                                <i class="bi bi-trash3-fill" style="font-size:1.3rem;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
            <a href="index.php?action=add_film" class="btn btn-secondary"><i class="bi bi-plus text-primary"></i> Ajouter un film</a>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>