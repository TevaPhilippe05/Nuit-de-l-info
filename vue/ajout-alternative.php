<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle alternative</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div id="barre_header">
        <div id="sous_barre_header">
            <a href="index.php">
                <img src="../imgs/logo.png" alt="logo">
            </a>
            <a href="index.php" class="titre_header">
                <p>NOM_SITE</p>
            </a>
            <div style="width: 40vw;"></div>
        </div>

        <a id="img_profil" href="TODO"><img src="../imgs/profil.png" alt="img profil"></a>

    </div>
</header>
<body>
    <section>
        <h1>Ajouter une nouvelle alternative</h1>
    </section>
    <div class="progression-ajout">
        <div class="barre-ajout"></div>
    </div>
    <form action="http://51.68.91.213/info102/tp2.php" method="POST">
        <fieldset>
            <legend>Application à remplacer</legend>
            <div>
                <label for="app">Choisissez une application : </label>
                <select name="app" id="app">
                    <option value="windows">Windows</option>
                    <!-- https://stackoverflow.com/questions/8022353/how-to-populate-html-dropdown-list-with-values-from-database -->
                </select>
            </div>
            <button type="submit">Confirmer</button>
        </fieldset>
    </form>
    <p>L'application n'est pas référencée sur le site ? <button>Ajoutez-la !</button></p>
    <form action="http://51.68.91.213/info102/tp2.php" method="POST">
        <fieldset>
            <legend>Application à remplacer</legend>
            <p><label for="nom-app">Nom : </label><input type="text" name="nom-app" id="nom-app" placeholder="Windows"></p>
            <p><label for="logo-app">Logo : </label><input type="file" name="logo-app" id="logo-app"></p>
            <p><label for="description-app">Description : </label><textarea name="description-app" id="description-app" placeholder="Un système d'exploitation"></textarea></p>
            <p><label for="site-app">Site : </label><input type="url" name="site-app" id="site-app" placeholder="https://www.microsoft.com/en-us/windows/"></p>
            <button type="submit">Confirmer</button>
        </fieldset>
    </form>
    <div style="height: 40px;"></div> <!-- Supprimer quand il y a du css-->
    <form action="http://51.68.91.213/info102/tp2.php" method="POST">
        <fieldset>
            <legend>Alternative open-source</legend>
            <div>
                <label for="app">Choisissez une alternative : </label>
                <select name="app" id="app">
                    <option value="Debian">Debian</option>
                    <!-- https://stackoverflow.com/questions/8022353/how-to-populate-html-dropdown-list-with-values-from-database -->
                </select>
            </div>
            <button type="submit">Confirmer</button>
        </fieldset>
    </form>
    <p>L'alternative n'est pas référencée sur le site ? <button>Ajoutez-la !</button></p>
    <form action="http://51.68.91.213/info102/tp2.php" method="POST">
        <fieldset>
            <legend>Alternative open-source</legend>
            <p><label for="nom-alt">Nom : </label><input type="text" name="nom-alt" id="nom-alt" placeholder="Debian"></p>
            <p><label for="logo-alt">Logo : </label><input type="file" name="logo-alt" id="logo-alt"></p>
            <p><label for="description-alt">Description : </label><textarea name="description-alt" id="description-app" placeholder="Un système d'exploitation open-source"></textarea></p>
            <p><label for="site-alt">Site : </label><input type="url" name="site-alt" id="site-alt" placeholder="https://www.debian.org/"></p>
            <button type="submit">Confirmer</button>
        </fieldset>
    </form>
</body>
</html>