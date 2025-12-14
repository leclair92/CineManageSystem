<?php require __DIR__ . '/layouts/header.php'; ?>


<div class="container py-5" data-bs-theme="light">
    <div class="py-3">
        <a href="?action=accueil#listing" class="text-uppercase fw-bold h5"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a> <br>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-bg-dark h-100">
                <?php
                $afficheUrl = !empty($film['affiche_film']) ? '/CineManageSystem/public/images/' . $film['affiche_film'] : '/CineManageSystem/public/images/default.jpg';
                ?>

                <img src="<?= htmlspecialchars($afficheUrl) ?>"
                    class="card-img"
                    alt="<?= htmlspecialchars($film['titre']) ?>">

                <p class="card-category-pill m-0"><?= htmlspecialchars($film['genre_nom']) ?></p>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="mb-0"><?= htmlspecialchars($film['titre']) ?></h1>
                    <p class="lead"><?= htmlspecialchars($film['description']) ?></p>
                </div>
                <div class="col-lg-3 text-end">
                    <a href="#" class="btn btn-primary"><i class="bi bi-ticket-detailed"></i> Acheter un billet</a>
                </div>
            </div>
            <div class="row pt-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">
                            <i class="bi bi-list-ul text-primary me-1"></i> Informations
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="horaire-tab" data-bs-toggle="tab" data-bs-target="#horaire" type="button">
                            <i class="bi bi-clock-history text-primary me-1"></i> Horaire
                        </button>
                    </li>
                </ul>
                <div class="tab-content bg-white p-4 shadow">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="row g-5">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between border-bottom">
                                    <p class="fw-bold">Année de sortie</p>
                                    <p><?= $film['annee_sortie'] ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mt-3">
                                    <p class="fw-bold">Réalisateur</p>
                                    <p><?= $film['realisateur'] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between border-bottom">
                                    <p class="fw-bold">Genre</p>
                                    <p><?= $film['genre_nom'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="horaire" role="tabpanel">
                        <div class="row g-3">
              
                                <?php foreach ($seances as $seance): ?>
                                                <div class="col-md-6">
                                    <?php
                                        $date = date('d', strtotime($seance['date_heure']));
                                        $mois = date('M', strtotime($seance['date_heure']));
                                        $heure = date('H\hi', strtotime($seance['date_heure']));
                                        ?>
                    <div class="date-box-wrap d-flex align-items-center bg-secondary mb-3">
                            <div class="date-box text-center me-3">
                                <div class="date"><?= $date ?></div>
                                <div class="month"><?= strtoupper($mois) ?></div>
                            </div>

                            <div class="schedule-card flex-grow-1">
                                <strong><?= htmlspecialchars($seance['salle_nom']) ?></strong>
                                <div class="hour-list"><?= $heure ?></div>
                            </div>
                        </div>
   </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>