
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

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

require '../modele/crudlogiciel.php';
require '../modele/db.php';
require '../modele/crudlogicielassoc.php';

function html_logiciel_affichage($logiciel) {
    ob_start(); // On démarre la capture du HTML
?>
    
<div class="premiere_partie">
    <div id="div_img_logi">
        <span id="block_logi_indiv">
            <img id="img_logi" src="data:image/webp;base64,<?php echo base64_encode($logiciel['img']); ?>" style="padding: 1%;">
        </span>
    </div>

    <div id="div_text_logi">
        <div id="div_titre_boutons_logi">
            <div id="div_titre_logi">
                <h1 id="titre_logi"><?php echo $logiciel['nom']; ?></h1>
            </div>
        </div>

        <div class="tags_description_logi">
            <h2 id="ttr_descr">Description :</h2>
            <br>
            <p id="txt_descr"><?php echo nl2br($logiciel['description']); ?></p>
        </div>
    </div>
</div>

<div class="deuxieme_partie">
    <div id="div_liens_logi">
        <h2 id="ttr_liens_logi">Lien :</h2>
        <br>
        <p id="span_lien_logi">
            <a href="<?php echo $logiciel['lien']; ?>" target="_blank">
                <?php echo $logiciel['lien']; ?>
            </a>
        </p>
    </div>
</div>

<?php
    return ob_get_clean(); // renvoie tout le HTML capturé
}

// ------------------
// Récupération du logiciel
// ------------------

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: ./forum.php");
    exit;
}

$alternatives = getAlternativesForLogiciel($conn, $id);
$logiciel = getLogiciel($conn, $id);

if (!$logiciel) {
    header("Location: ./forum.php");
    exit;
}

$html = html_logiciel_affichage($logiciel);
echo($html);
?>

<div class="deuxieme_partie">
    <div id="div_liens_logi">
        <h2 id="ttr_liens_logi">Lien :</h2>
        <br>
        <p id="span_lien_logi"></p>
    </div>
    <div id="div_assoc">
        <h2 id="ttr_comms">Outils alternatifs :</h2>
        <br>
        <div id="div_logi_assoc">

    <?php if (empty($alternatives)) : ?>
        <p>Aucun outil alternatif disponible.</p>

    <?php else : ?>
        <?php foreach ($alternatives as $alt): ?>

            <a href="logiciel.php?id=<?php echo $alt['id']; ?>" class="alt_item">
                <div class="alt_card">
                    
                    <img class="alt_img"
                         src="data:image/webp;base64,<?php echo base64_encode($alt['img']); ?>" />

                    <p class="alt_nom"><?php echo $alt['nom']; ?></p>
                </div>
            </a>

        <?php endforeach; ?>
    <?php endif; ?>

</div>
    </div>
</div>
</div>