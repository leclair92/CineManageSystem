<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <h1 class="h2 mt-0">Dashboard Admin</h1>
           <div class="row mt-4">
    <div class="col-lg-4">
        <div class="p-4 text-center shadow-sm" style="background:#e9f3ff; border-radius:12px;">
            <h2 class="fw-bold mb-0" style="color:#ff9900; font-size:2.5rem;">
                <?= $nbFilms ?>
            </h2>
            <p class="text-uppercase fw-bold m-0">Films à l'affiche</p>

            <a href="?action=liste_films" class="btn btn-secondary w-100 mt-2">
               <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff9900"><path d="M160-240v-320 320Zm0 80q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800l80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v160H160v320h160v80H160Zm480 80L520-200H400v-160h120l120-120v400Zm80 36v-82q52-14 86-56t34-98q0-56-34-98t-86-56v-82q86 14 143 80t57 156q0 90-57 156T720-44Zm0-144v-184q27 11 43.5 36t16.5 56q0 31-16.5 56T720-188Z"/></svg> Gérer les films
            </a>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
<?php require __DIR__ . '/layouts/footer.php'; ?>

