<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style/page-qcm.css">
    <style>
        /* Ajoutez ce CSS pour styliser les réponses après vérification */
        .reponse-correcte {
            background-color: #a8e8a8 !important; /* Vert clair */
            border: 2px solid green;
            cursor: default; /* Change le curseur */
        }
        .reponse-fausse {
            background-color: #f7a7a7 !important; /* Rouge clair */
            border: 2px solid red;
        }
        .resultat.visible {
            display: block;
        }
    </style>
</head>
<body>
    <h1 class="titre">QUIZZ</h1>

    <div class="container-img">
        <img id="img_question" src="" alt="img_question">
    </div>

    <h2 class="question">Chargement de la question...</h2>

    <div class="reponses">
        </div>

    <h2 class="resultat-titre">Résultat :</h2>

    <div class="resultat" hidden>
        </div>

    <div class="bt_suivant">Suivant</div>

    <script src="script/gere_quiz_page.js"></script>
</body>
</html>
