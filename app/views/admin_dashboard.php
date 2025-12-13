<?php require __DIR__ . '/layouts/header.php'; ?>
<div class="container py-5" data-bs-theme="light">
    <div class="row bg-white" style="border-radius:0.5em">
        <div class="col-lg-3 p-0 bg-secondary admin-dash-menu">
            <?php require __DIR__ . '/layouts/dashboard-menu.php'; ?>
        </div>

        <div class="col-lg-9 p-4 admin-dash">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="h2 mt-0">Dashboard Admin</h1>
                </div>
                <div class="col-lg-6 d-flex gap-2 align-items-center justify-content-end">
                    <p class="h4"> <i class="bi bi-calendar text-primary"></i> <span class="date-aujourdhui"></span></p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="p-4 text-center shadow-sm" style="background:#e9f3ff; border-radius:12px;">
                        <h2 class="fw-bold mb-0" style="color:#ff9900; font-size:2.5rem;">
                            <?= $nbFilms ?>
                        </h2>
                        <p class="text-uppercase fw-bold m-0">Films à l'affiche</p>

                        <a href="?action=liste_films" class="btn btn-secondary btn-sm w-100 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff9900">
                                <path d="M160-240v-320 320Zm0 80q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800l80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v160H160v320h160v80H160Zm480 80L520-200H400v-160h120l120-120v400Zm80 36v-82q52-14 86-56t34-98q0-56-34-98t-86-56v-82q86 14 143 80t57 156q0 90-57 156T720-44Zm0-144v-184q27 11 43.5 36t16.5 56q0 31-16.5 56T720-188Z" />
                            </svg> Gérer
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-4 text-center shadow-sm" style="background:#e9f3ff; border-radius:12px;">
                        <h2 class="fw-bold mb-0" style="color:#ff9900; font-size:2.5rem;">
                            <?= $nbSalles ?>
                        </h2>
                        <p class="text-uppercase fw-bold m-0">Salles</p>

                        <a href="?action=liste_salles" class="btn btn-sm btn-secondary w-100 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--bs-primary)">
                                <path d="M200-120q-17 0-28.5-11.5T160-160v-40q-50 0-85-35t-35-85v-200q0-50 35-85t85-35v-80q0-50 35-85t85-35h400q50 0 85 35t35 85v80q50 0 85 35t35 85v200q0 50-35 85t-85 35v40q0 17-11.5 28.5T760-120q-17 0-28.5-11.5T720-160v-40H240v40q0 17-11.5 28.5T200-120Zm-40-160h640q17 0 28.5-11.5T840-320v-200q0-17-11.5-28.5T800-560q-17 0-28.5 11.5T760-520v160H200v-160q0-17-11.5-28.5T160-560q-17 0-28.5 11.5T120-520v200q0 17 11.5 28.5T160-280Zm120-160h400v-80q0-27 11-49t29-39v-112q0-17-11.5-28.5T680-760H280q-17 0-28.5 11.5T240-720v112q18 17 29 39t11 49v80Zm200 0Zm0 160Zm0-80Z" />
                            </svg> Gérer
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-4 text-center shadow-sm" style="background:#e9f3ff; border-radius:12px;">
                        <h2 class="fw-bold mb-0" style="color:#ff9900; font-size:2.5rem;">
                            <?= $nbSeance ?>
                        </h2>
                        <p class="text-uppercase fw-bold m-0">Séances prévues</p>

                        <a href="?action=liste_seances" class="btn btn-sm btn-secondary w-100 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--bs-primary)">
                                <path d="m520-384 56-56-96-96v-184h-80v216l120 120ZM368-249q16-48 56.5-79.5T518-360h152q24-34 37-74.5t13-85.5q0-117-81.5-198.5T440-800q-117 0-198.5 81.5T160-520q0 98 58.5 172.5T368-249ZM520-40q-58 0-102-36.5T363-168q-122-26-202.5-124T80-520q0-150 105-255t255-105q150 0 255 105t105 255q0 43-9.5 83.5T763-360q66 0 111.5 47T920-200q0 66-47 113T760-40H520Zm-80-485Zm200 325Zm-120 80h240q33 0 56.5-23.5T840-200q0-33-23.5-56.5T760-280H520q-33 0-56.5 23.5T440-200q0 33 23.5 56.5T520-120Zm0-40q-17 0-28.5-11.5T480-200q0-17 11.5-28.5T520-240q17 0 28.5 11.5T560-200q0 17-11.5 28.5T520-160Zm120 0q-17 0-28.5-11.5T600-200q0-17 11.5-28.5T640-240q17 0 28.5 11.5T680-200q0 17-11.5 28.5T640-160Zm120 0q-17 0-28.5-11.5T720-200q0-17 11.5-28.5T760-240q17 0 28.5 11.5T800-200q0 17-11.5 28.5T760-160Z" />
                            </svg> Gérer
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="p-4 text-center shadow-sm" style="background:#e9f3ff; border-radius:12px;">
                        <h2 class="fw-bold mb-0" style="color:#ff9900; font-size:2.5rem;">
                            <?= $nbSutilisateurs ?>
                        </h2>
                        <p class="text-uppercase fw-bold m-0">Utilisateurs</p>

                        <a href="?action=liste_utilisateurs" class="btn btn-sm btn-secondary w-100 mt-2">
                          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="var(--bs-primary)"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"></path></svg> Gérer
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>