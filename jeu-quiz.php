<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style/page-qcm.css">
    <style>
        
        .reponse-correcte {
            background-color: #a8e8a8 !important; 
            border: 2px solid green;
            cursor: default; 
        }
        .reponse-fausse {
            background-color: #f7a7a7 !important; 
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

    <p class="description-quiz">
        Bienvenue dans le terminal jeune résistant(e) ! <br>
        <br>
        N'ayez crainte, vous n'êtes pas seul dans cette lutte contre les géants du logiciel propriétaire.
        Ce quiz va tester vos connaissances sur le logiciel libre. Comme vous le savez surement, les GAFAM ont le quasi monopole sur le marché du logiciel. Il n'y a qu'un moyen de les contrer ! S'informer.
        Mais comment me direz-vous ? En répondant à ce quiz bien sûr ! Chaque bonne réponse vous rapprochera un peu plus de la vérité sur le logiciel libre et les dangers des logiciels propriétaires. Alors, êtes-vous prêt à relever le défi et à défendre la liberté numérique ? C'est parti !
    </p>
    <br>
    <div class="reponses">
        </div>

    <div class="msg-fin" hidden>
        <p>Alors ? On kiffe toujours autant les GAFAM ? Si vous souhaitez en savoir plus, n'hésitez pas à explorer le site <a href="https://nird.forge.apps.education.fr/">NIRD</a> afin de comprendre la démarche NIRD, le but est d'étendre cette démarche aux établissement scolaires.</p>
    </div>

    <h2 class="resultat-titre" hidden>Résultat :</h2>

    <div class="resultat" hidden>
        
    </div>

    <div class="bt_suivant">Suivant</div>

    <script src="script/gere_quiz_page.js"></script>
</body>
</html>
