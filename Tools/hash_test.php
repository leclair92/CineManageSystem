<?php
// tools/hash_test.php

// ⚠️ Tu peux changer ce mot de passe si tu veux
$password = 'Admin123!';

// On génère le hash sécurisé
$hash = password_hash($password, PASSWORD_DEFAULT);

// On l'affiche joliment dans le navigateur
echo "<h2>Générateur de hash pour mot de passe</h2>";
echo "<p>Mot de passe en clair : <strong>{$password}</strong></p>";
echo "<p>Hash à copier dans la base de données :</p>";
echo "<textarea style='width:100%;height:150px;'>" . htmlspecialchars($hash) . "</textarea>";
