<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Clothin Time - Weather!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Clothin Time</h1>
    </header>

    <main>
        <section class="weather">
            <h2>Météo</h2>
            <form>
                <label for="city">Ville :</label>
                <input type="text" id="city" name="city" required>
                <button type="submit">gO !</button>
            </form>
            <div class="weather-info">
                <p><strong>Température :</strong> <span id="temperature"></span></p>
                <p><strong>Conditions :</strong> <span id="conditions"></span></p>
            </div>
        </section>

        <section class="outfit">
            <h2>Whaaaat 2 wear ...</h2>
            <div class="outfit-info">
                <p><strong>Haut :</strong> <span id="top"></span></p>
                <p><strong>Bas :</strong> <span id="bottom"></span></p>
                <p><strong>Chaussures :</strong> <span id="shoes"></span></p>
            </div>
            <button id="get-outfit-btn">Outfit Toi mon gars !</button>
        </section>
    </main>

    <footer>
        <p>&copy; Clothin Time 2023</p>
    </footer>

    <script src="script.php"></script>
</body>

</html>