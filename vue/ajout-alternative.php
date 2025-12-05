<?php
require '../modele/db.php';
require '../modele/crudlogiciel.php';
require '../modele/crudlogicielassoc.php';

// Récupérer tous les logiciels pour remplir les select
$logiciels = getAllLogiciels($conn);


function getUploadedImage($fileField) {
    if (!isset($_FILES[$fileField]) || $_FILES[$fileField]['error'] !== 0) {
        return null;
    }
    return file_get_contents($_FILES[$fileField]['tmp_name']);
}
// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ===== LOGICIEL PRINCIPAL ===== */

    if (!empty($_POST['app'])) {
        $id_logiciel = (int)$_POST['app'];
    } 
    elseif (!empty($_POST['nom-app'])) {
        $nom = $_POST['nom-app'];
        $img = getUploadedImage("logo-app");
        $desc = $_POST['description-app'] ?? '';
        $lien = $_POST['site-app'] ?? '';

        $id_logiciel = createLogiciel($conn, $nom, $img, $desc, $lien);
    } 
    else {
        die("Logiciel principal non défini.");
    }


    /* ===== ALTERNATIVE ===== */

    if (!empty($_POST['app-alt'])) {
        $id_alt = (int)$_POST['app-alt'];
    } 
    elseif (!empty($_POST['nom-alt'])) {
        $nom = $_POST['nom-alt'];
        $img = getUploadedImage("logo-alt");
        $desc = $_POST['description-alt'] ?? '';
        $lien = $_POST['site-alt'] ?? '';

        $id_alt = createLogiciel($conn, $nom, $img, $desc, $lien);
    } 
    else {
        die("Alternative non définie.");
    }


    /* ===== ASSOCIATION ===== */

    addLogicielAssocie($conn, $id_logiciel, $id_alt);

    header("Location: logiciel.php?id=$id_logiciel");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle alternative</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <div id="barre_header">
        <div id="sous_barre_header">
            <a href="../index.php">
                <img src="../imgs/logo.png" alt="logo">
            </a>
            <a href="forum.php" class="titre_header">
                <p>FORUM</p>
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

<!-- FORMULAIRE UNIQUE -->
<form action="" method="POST" enctype="multipart/form-data" id="form-ajout-alternative">

    <!-- Logiciel principal -->
    <fieldset class="champ-form-ajout">
        <legend>Application à remplacer</legend>

        <label for="app">Choisissez une application existante :</label>
        <select name="app" id="app">
            <option value="">-- Aucun --</option>
            <?php foreach ($logiciels as $l): ?>
                <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['nom']) ?></option>
            <?php endforeach; ?>
        </select>

        <p>Ou créez un nouveau logiciel :</p>
        <input type="text" name="nom-app" placeholder="Nom du logiciel">
        <input type="file" name="logo-app">
        <textarea name="description-app" placeholder="Description du logiciel"></textarea>
        <input type="url" name="site-app" placeholder="Lien du logiciel">
    </fieldset>

    <!-- Alternative -->
    <fieldset class="champ-form-ajout">
        <legend>Alternative open-source</legend>

        <label for="app-alt">Choisissez une alternative existante :</label>
        <select name="app-alt" id="app-alt">
            <option value="">-- Aucun --</option>
            <?php foreach ($logiciels as $l): ?>
                <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['nom']) ?></option>
            <?php endforeach; ?>
        </select>

        <p>Ou créez une nouvelle alternative :</p>
        <input type="text" name="nom-alt" placeholder="Nom de l’alternative">
        <input type="file" name="logo-alt">
        <textarea name="description-alt" placeholder="Description de l’alternative"></textarea>
        <input type="url" name="site-alt" placeholder="Lien de l’alternative">
    </fieldset>

    <button type="submit">Ajouter l’alternative</button>
</form>

<script type="text/javascript" src="../scripts/script.js"></script>
</body>
</html>