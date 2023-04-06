<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Clothin Time - Connexion / Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\public\assets\css\style.css">
</head>
<?php include 'header.php' ?>

<body>
    <main>
        <section class="login" method="get">
            <h2>Connexion</h2>
            <form>
                <div>
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Se connecter</button><br>
                <a href="register.php">New here ? -> Create account</a>
            </form>
        </section>

    </main>
    <?php include 'footer.php'; ?>
</body>

</html>