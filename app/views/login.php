<?php 
include '../app/views/layouts/header.php'; 
?>

<div class="login-container">
    <h2>Connexion Administrateur</h2>

    <?php if (!empty($error)): ?>
        <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form" action="index.php?action=login">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</div>

<?php 
include '../app/views/layouts/footer.php'; 
?>
