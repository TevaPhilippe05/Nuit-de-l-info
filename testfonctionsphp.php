<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Test des questions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .question {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .reponse {
            margin-left: 20px;
        }

        .vrai {
            color: green;
            font-weight: bold;
        }

        .faux {
            color: red;
        }

        .explication {
            margin-top: 10px;
            padding: 10px;
            background-color: #eef;
            border-left: 4px solid #99f;
            border-radius: 4px;
            font-style: italic;
        }
    </style>
</head>

<body>

    <h1>Test des fonctions Questions / Réponses</h1>

    <?php
    require_once "lib/qcm.php";

    $questions = GetQuestions($conn);

    foreach ($questions as $q) {
        echo "<div class='question'>";
        echo "<h2>Question : " . $q['question'] . "</h2>";

        $reponses = GetReponsesByQuestionId($conn, $q['id']);

        foreach ($reponses as $r) {
            $statut = EstVrai($conn, $r['id']);

            if ($statut == 1) {
                echo "<div class='reponse vrai'>✔ " . $r['reponse'] . "</div>";
            } else {
                echo "<div class='reponse faux'>✖ " . $r['reponse'] . "</div>";
            }
        }

        $explication = GetExplicationByQuestionId($conn, $q['id']);
        if ($explication && isset($explication['explication'])) {
            echo "<div class='explication'><strong>Explication :</strong> " . $explication['explication'] . "</div>";
        }

        echo "</div>";
    }

    mysqli_close($conn);
    ?>

</body>

</html>