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
    <form id="sel-form-app" action="" method="POST">
        <fieldset class="champ-form-ajout">
            <legend>Application à remplacer</legend>
            <div>
                <label for="app">Choisissez une application : </label>
                <select name="app" id="app">
                    <option value="windows">Windows</option>
                </select>
            </div>
            <button id="btn-sel-conf-app" type="button">Confirmer</button>
        </fieldset>
    </form>
    <p id="txt-form-app">L'application n'est pas référencée sur le site ? <button id="btn-add-app">Ajoutez-la !</button></p>
    <form id="new-form-app" class="cache-form" action="" method="POST">
        <fieldset class="champ-form-ajout">
            <legend>Application à remplacer</legend>
            <p><label for="nom-app">Nom : </label><input type="text" name="nom-app" id="nom-app" placeholder="Windows" required></p>
            <p><label for="logo-app">Logo : </label><input type="file" name="logo-app" id="logo-app"></p>
            <p><label for="description-app">Description : </label><textarea name="description-app" id="description-app" placeholder="Un système d'exploitation"></textarea></p>
            <p><label for="site-app">Site : </label><input type="url" name="site-app" id="site-app" placeholder="https://www.microsoft.com/en-us/windows/"></p>
            <button id="btn-new-conf-app" type="submit">Confirmer</button>
        </fieldset>
    </form>
    <form id="sel-form-alt" class="cache-form" action="" method="POST">
        <fieldset class="champ-form-ajout">
            <legend>Alternative open-source</legend>
            <div>
                <label for="app">Choisissez une alternative : </label>
                <select name="app" id="app">
                    <option value="Debian">Debian</option>
                </select>
            </div>
            <button id="btn-sel-conf-alt" type="button">Confirmer</button>
        </fieldset>
    </form>
    <p id="txt-form-alt" class="cache-form">L'alternative n'est pas référencée sur le site ? <button id="btn-add-alt">Ajoutez-la !</button></p>
    <form id="new-form-alt" class="cache-form" action="" method="POST">
        <fieldset class="champ-form-ajout">
            <legend>Alternative open-source</legend>
            <p><label for="nom-alt">Nom : </label><input type="text" name="nom-alt" id="nom-alt" placeholder="Debian"></p>
            <p><label for="logo-alt">Logo : </label><input type="file" name="logo-alt" id="logo-alt"></p>
            <p><label for="description-alt">Description : </label><textarea name="description-alt" id="description-app" placeholder="Un système d'exploitation open-source"></textarea></p>
            <p><label for="site-alt">Site : </label><input type="url" name="site-alt" id="site-alt" placeholder="https://www.debian.org/"></p>
            <button id="btn-new-conf-alt" type="submit">Confirmer</button>
        </fieldset>
    </form>
    <script type="text/javascript" src="../scripts/script.js"></script>
</body>
</html>