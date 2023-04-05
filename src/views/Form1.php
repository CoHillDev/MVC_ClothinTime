<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Clothin Time - Connexion / Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Clothin'Time</h1>
    </header>

    <main>
        <section class="login">
            <h2>Connexion</h2>
            <form>
                <div>
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Se connecter</button>
            </form>
        </section>

        <section class="register">
            <h2>Inscription</h2>
            <form>
                <div>
                    <label for="name">Nom complet :</label>
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
    </main>

    <footer>
        <p>&copy; Clothin Time 2023</p>
    </footer>
</body>

</html>