<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="py-3">
        <a href="?action=accueil" class="btn-link text-uppercase fw-bold"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a> <br> 
    </div>
    <div class="row">
        <div class="col-lg-3">
                <div class="card text-bg-dark h-100">
                    <!--<img src="<?php echo BASE_URL; ?>images/Intouchables.jpg" class="card-img" alt="<?= htmlspecialchars($film['titre']) ?>">-->
                    <p class="card-category-pill m-0"><?= htmlspecialchars($film['genre']) ?></p>
                </div>    
       </div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="mb-0"><?= htmlspecialchars($film['titre']) ?></h1>
                    <p class="lead"><?= htmlspecialchars($film['description']) ?></p>
                </div>
                <div class="col-lg-3 text-end">
                    <!--<a href="#" class="btn btn-primary"><i class="bi bi-ticket-detailed"></i> Acheter un billet</a>-->
                </div>
            </div>
            <div class="row pt-3">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">
                            <i class="bi bi-list-ul text-primary me-1"></i> Informations
                        </button>
                    </li><!--
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="horaire-tab" data-bs-toggle="tab" data-bs-target="#horaire" type="button">
                            <i class="bi bi-clock-history text-primary me-1"></i> Horaire
                        </button>
                    </li>-->
                </ul>

<a href="<?php echo BASE_URL; ?>index.php?action=accueil">⬅ Retour</a> <br> 
<br>
<h2><?= htmlspecialchars($film['titre']) ?></h2>
<p><strong>Réalisateur :</strong> <?= htmlspecialchars($film['realisateur']) ?></p>
<p><strong>Genre :</strong> <?= htmlspecialchars($film['genre_nom']) ?></p>
<p><strong>Année :</strong> <?= htmlspecialchars($film['annee_sortie']) ?></p>
<p><strong>Description:</strong>
<?= htmlspecialchars($film['description']) ?></p>

                    <!-- Informations tab -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="row g-5">
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between border-bottom">
                                    <p class="fw-bold">Année de sortie</p><p><?= $film['annee_sortie'] ?></p>
                                </div>
                                <div class="d-flex justify-content-between border-bottom mt-3">
                                    <p class="fw-bold">Réalisateur</p><p><?= $film['realisateur'] ?></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex justify-content-between border-bottom">
                                    <p class="fw-bold">Réalisateur</p><p><?= $film['genre'] ?></p>
                                </div>                     
                            </div>
                        </div>
                    </div>

                  <!-- <div class="tab-pane fade" id="horaire" role="tabpanel">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="date-box-wrap d-flex align-items-center bg-secondary">
                                    <div class="date-box">
                                        <div class="date">16</div>
                                        <div class="month">NOV</div>
                                    </div>
                                    <div class="schedule-card flex-grow-1">
                                        <strong>Salle 1</strong>
                                        <div class="hour-list">10h00 | 12h05 | 21h45</div>
                                    </div>
                                </div>
                                <div class="date-box-wrap d-flex align-items-center bg-secondary mt-3">
                                    <div class="date-box">
                                        <div class="date">17</div>
                                        <div class="month">NOV</div>
                                    </div>
                                    <div class="schedule-card flex-grow-1">
                                        <strong>Salle 2</strong>
                                        <div class="hour-list">10h00 | 12h05 | 21h45</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="date-box-wrap d-flex align-items-center bg-secondary">
                                    <div class="date-box">
                                        <div class="date">18</div>
                                        <div class="month">NOV</div>
                                    </div>
                                    <div class="schedule-card flex-grow-1">
                                        <strong>Salle 2</strong>
                                        <div class="hour-list">10h00 | 12h05 | 21h45</div>
                                    </div>
                                </div>

                                <div class="date-box-wrap d-flex align-items-center mt-3 bg-secondary">
                                    <div class="date-box">
                                        <div class="date">19</div>
                                        <div class="month">NOV</div>
                                    </div>
                                    <div class="schedule-card flex-grow-1">
                                        <strong>Salle 3</strong>
                                        <div class="hour-list">10h00 | 12h05 | 21h45</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>
