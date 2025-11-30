<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="py-3">
        <a href="?action=accueil" class="btn-link text-uppercase fw-bold"><i class="bi bi-arrow-left-circle-fill"></i> Retour</a> <br> 
    </div>
    <div class="row">
        <div class="col-lg-3"><img src="<?php echo BASE_URL; ?>images/Intouchables.jpg"></div>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="mb-0"><?= htmlspecialchars($film['titre']) ?></h1>
                    <p class="lead"><?= htmlspecialchars($film['description']) ?></p>
                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-primary"><i class="bi bi-ticket-detailed"></i> Acheter un billet</a>
                </div>
            </div>
            <div class="row">

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">
                <i class="bi bi-list-ul text-primary"></i> Informations
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="horaire-tab" data-bs-toggle="tab" data-bs-target="#horaire" type="button">
                <i class="bi bi-clock-history text-primary"></i> Horaire
            </button>
        </li>
    </ul>

    <div class="tab-content bg-white p-3">

        <!-- Informations tab -->
        <div class="tab-pane fade show active" id="info" role="tabpanel">
            <p>Contenu informations…</p>
        </div>

        <!-- Horaire tab -->
        <div class="tab-pane fade" id="horaire" role="tabpanel">

            <div class="row g-3">

                <!-- Column 1 -->
                <div class="col-md-6">
                    <!-- Card 16 NOV - Salle 1 -->
                    <div class="d-flex align-items-center bg-secondary">
                        <div class="date-box">
                            <div>16</div>
                            <div>NOV</div>
                        </div>
                        <div class="schedule-card flex-grow-1">
                            <strong>Salle 1</strong>
                            <div class="hour-list">10h00 | 12h05 | 21h45</div>
                        </div>
                    </div>

                    <!-- Card 17 NOV - Salle 2 -->
                    <div class="d-flex align-items-center mt-3">
                        <div class="date-box">
                            <div>17</div>
                            <div>NOV</div>
                        </div>
                        <div class="schedule-card flex-grow-1">
                            <strong>Salle 2</strong>
                            <div class="hour-list">10h00 | 12h05 | 21h45</div>
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-md-6">
                    <!-- Card 16 NOV - Salle 2 -->
                    <div class="d-flex align-items-center">
                        <div class="date-box">
                            <div>16</div>
                            <div>NOV</div>
                        </div>
                        <div class="schedule-card flex-grow-1">
                            <strong>Salle 2</strong>
                            <div class="hour-list">10h00 | 12h05 | 21h45</div>
                        </div>
                    </div>

                    <!-- Card 17 NOV - Salle 3 -->
                    <div class="d-flex align-items-center mt-3">
                        <div class="date-box">
                            <div>17</div>
                            <div>NOV</div>
                        </div>
                        <div class="schedule-card flex-grow-1">
                            <strong>Salle 3</strong>
                            <div class="hour-list">10h00 | 12h05 | 21h45</div>
                        </div>
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
