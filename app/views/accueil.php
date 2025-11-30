<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">

<div class="row align-items-center">
    <div class="col-lg-6">
        <h1 class="h2 text-uppercase">Découvrir les films <br><span style="color:var(--bs-primary);"> à l'affiche</span></h1>
    </div>
    <div class="col-lg-6">
      <form class="d-flex gap-2 justify-content-end">
        <div class="mb-3">
            <label for="rechercheFilm" class="form-label mb-0 fw-bold"> Recherche</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input class="form-control border-start-0" id="rechercheFilm" type="search" aria-label="recherche">
            </div>
        </div>

        <div class="mb-3">
            <p class="fw-bold m-0">Année</p>
            <select class="form-select" aria-label="annee">
                <option value="2025" selected>2025</option>
                <option value="2024">2024</option>
            </select>
        </div>
    
        <div class="mb-3">
            <p class="fw-bold m-0"> Genre</p>
            <select class="form-select" aria-label="genre">
                <option selected>Tous</option>
                <option value="horreur">Horreur</option>
            </select>
        </div>
      <form>
    </div>
</div>

    <?php if (!empty($films)) : ?>
        <div class="row py-5">

            <?php foreach ($films as $film): ?>
        <div class="col-lg-3 text-center">
            <div class="card text-bg-dark">
                <a href="?action=show_film&id=<?= $film['id'] ?>">
  <img src="<?php echo BASE_URL; ?>images/Intouchables.jpg" class="card-img" alt="<?= htmlspecialchars($film['titre']) ?>">
  <div class="card-img-overlay">
    <h5 class="card-title"> <?= htmlspecialchars($film['titre']) ?></h5>
    <p class="card-text">(<?= htmlspecialchars($film['annee_sortie']) ?>)</p>
    
  </div>
     </a>
</div>
              
            </div>
            <?php endforeach; ?>

            </div>
    <?php else: ?>
        <p>Aucun film trouvé.</p>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>




