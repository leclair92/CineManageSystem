<?php require __DIR__ . '/layouts/header.php'; ?>


<div id="carouselFilms" class="carousel slide bg-dark" data-bs-ride="carousel">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselFilms" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselFilms" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselFilms" data-bs-slide-to="2"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
        
     <img src="<?php echo BASE_URL; ?>images/slider-film-1.jpg" class="d-block w-100" alt="Rebelle">
      <div class="carousel-caption d-none d-md-block">
        <p class="h2">Rebelle</h5>
        <p class="lead">À l'affiche le 17 décembre 2025</p>
      </div>
    </div>

    <div class="carousel-item">
   <img src="<?php echo BASE_URL; ?>images/slider-film-2.jpg" class="d-block w-100" alt="Rebelle">
      <div class="carousel-caption d-none d-md-block">
      <p class="h2">Avatar</h5>
        <p class="lead">À l'affiche le 2 janvier 2026</p>
      </div>
    </div>

    <div class="carousel-item">
        <img src="<?php echo BASE_URL; ?>images/slider-film-3.jpg" class="d-block w-100" alt="Rebelle">
      <div class="carousel-caption d-none d-md-block">
        <p class="h2">Pirates des caraïbes</h5>
        <p class="lead">À l'affiche le 5 février 2026</p>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselFilms" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselFilms" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>




<div class="container py-5" data-bs-theme="light" id="listing">

    <div class="row align-items-center">
        <div class="col-lg-6">
                <h1 class="h2 text-uppercase">Découvrir les films <br><span style="color:var(--bs-primary);"> à l'affiche</span></h1>
        </div>
        <div class="col-lg-6">   
            <form class="d-flex gap-2 justify-content-end" method="GET" action="#listing">
                <div class="mb-3">
                    <label for="rechercheFilm" class="form-label mb-0 fw-bold"> Recherche</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control border-start-0" name="rechercheFilm" id="rechercheFilm" value="<?= htmlspecialchars($_GET['rechercheFilm'] ?? '') ?>" type="search" aria-label="recherche" onchange="this.form.submit()">
                    </div>
                </div>

                <div class="mb-3">
                    <p class="fw-bold m-0">Année</p>
                    <select class="form-select" name="annee" onchange="this.form.submit()">
                        <option value="">Tous</option>
                        <?php foreach ($annees as $annee): ?>
                            <option 
                                value="<?= htmlspecialchars($annee) ?>"
                                    <?= (($_GET['annee'] ?? '') == $annee) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($annee) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>   
                <div class="mb-3">
                        <p class="fw-bold m-0">Genre</p>
                       <select class="form-select" name="genre_id" onchange="this.form.submit()">
                            <option value="">Tous</option>

                            <?php foreach ($genres as $genre): ?>
                                <option 
                                    value="<?= htmlspecialchars($genre['id']) ?>"
                                    <?= (($_GET['genre_id'] ?? '') == $genre['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($genre['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                </div>
                <div class="mb-3 d-flex align-items-end">
                    <a href="?action=accueil#listing" class="btn btn-outline-secondary">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>
    </div>



    <?php if (!empty($films)) : ?>
        <div class="row py-5">
           <?php foreach ($films as $film): ?>
    <?php
        $afficheUrl = !empty($film['affiche_film'])
            ? '' .BASE_URL.'images/' . $film['affiche_film']
            : ''.BASE_URL.'images/default.jpg';
    ?>
    <div class="col-lg-3 text-center pb-4">
        <div class="card text-bg-dark">
            <a href="?action=show_film&id=<?= $film['id'] ?>" style="">
                <img src="<?= htmlspecialchars($afficheUrl) ?>"
                     class="card-img"
                     alt="<?= htmlspecialchars($film['titre']) ?>">

                <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <p class="card-category-pill m-0"><?= htmlspecialchars($film['genre_nom']) ?></p>
                    <p class="card-text m-0"><?= htmlspecialchars($film['annee_sortie']) ?></p>
                    <h5 class="card-title text-white m-0"><?= htmlspecialchars($film['titre']) ?></h5>
                    <p class="card-text text-white"><?= htmlspecialchars($film['realisateur']) ?></p>
                    <p class="card-icon-link">
                        <i class="bi bi-arrow-right" style="font-size:1.5rem;"></i>
                    </p>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>

        </div>
        <?php else: ?>
        <div class="text-center py-5">
            <p>Aucun film trouvé avec ces critères.</p>
            <a href="?action=accueil#listing" class="btn btn-outline-secondary">Recommencer la recherche</a>
        </div>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>




