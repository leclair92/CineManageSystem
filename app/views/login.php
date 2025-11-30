<?php 
include '../app/views/layouts/header.php'; 
?>
<div class="bg-dark py-5" data-bs-theme="light" style="background-color:#112f48;backgoround-size:cover;background-image:url('<?php echo BASE_URL; ?>images/background.jpg')">
<div class="container py-5" data-bs-theme="light">
<div class="login-container bg-white shadow-sm border-radius-sm p-5 m-auto" style="max-width:600px;">
    <h1 class="text-center h2 mt-0 mb-3">Connexion</h1>

    <?php if (!empty($error)): ?>
        <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form" action="index.php?action=login">
        <div class="input-group mb-3 border">
                <span class="input-group-text bg-white border-0">
                  <i class="bi bi-person-fill"></i>
                </span>
                <input class="form-control border-0 m-0" placeholder="Nom d'utilisateur"  id="username"  name="username" type="text" aria-label="username" required>
            </div>

<div class="input-group mb-3 border">
                <span class="input-group-text bg-white border-0">
                   <i class="bi bi-lock-fill"></i>
                </span>
                <input class="form-control border-0 m-0" id="password"  name="password" placeholder="Mot de passe" type="password" aria-label="password" required>
            </div>
        <button class="btn btn-primary btn-lg btn-block w-100" type="submit">Se connecter</button>
    </form>
</div>
<p class="h6S text-center mt-3 text-white">Vous n'avez pas de compte ? <a href="?action=inscription" class="link text-white text-decoration-underline">Inscrivez-vous</a></p>
</div>
</div>
<?php 
include '../app/views/layouts/footer.php'; 
?>
