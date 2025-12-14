<?php
include '../app/views/layouts/header.php';
?>

<div class="bg-dark py-5" data-bs-theme="light"
    style="background-color:#112f48;background-size:cover;
     background-image:url('<?php echo BASE_URL; ?>images/background.jpg')">

    <div class="container py-5">
        <div class="login-container bg-white shadow-sm p-5 m-auto"
            style="max-width:600px;border-radius:0.5em;">

            <h1 class="text-center h2 mt-0 mb-3">Inscription</h1>

            <?php if (!empty($error)) : ?> <p class="alert alert-danger text-center"> <i class="bi bi-exclamation-octagon-fill"></i> <?= htmlspecialchars($error) ?> </p>
            <?php endif; ?>

            <form method="POST" action="index.php?action=inscription">

                <div class="input-group mb-3 border">
                    <span class="input-group-text bg-white border-0">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input class="form-control border-0 m-0" name="nom" type="text" placeholder="Nom" required>
                </div>
                <div class="input-group mb-3 border">
                    <span class="input-group-text bg-white border-0">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input class="form-control border-0 m-0" name="courriel" type="email" placeholder="Adresse courriel" required>
                </div>

                <div class="input-group mb-4 border"> <span class="input-group-text bg-white border-0"> <i class="bi bi-lock-fill"></i> </span>
                    <input class="form-control border-0 m-0" name="password" type="password" placeholder="Mot de passe" required autocomplete="new-password">
                </div>

                <button class="btn btn-primary btn-lg w-100" type="submit"> Créer mon compte </button>

            </form>
        </div>

        <p class="text-center mt-3 text-white">
            Vous avez déjà un compte ? <a href="?action=login" class="text-white text-decoration-underline">Connectez-vous </a>
        </p>
    </div>
</div>
<?php
include '../app/views/layouts/footer.php';
?>