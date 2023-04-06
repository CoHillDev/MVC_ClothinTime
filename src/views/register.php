<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Clothin Time - Connexion / Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\public\assets\css\style.css">
</head>
<?php include 'header.php' ?>
<section class="register" method="post">
    <h2>Inscription</h2>
    <form>
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Adresse e-mail :</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm-password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button type="submit">S'inscrire</button>
    </form>
</section>
<?php include 'footer.php'; ?>
</body>

</html>