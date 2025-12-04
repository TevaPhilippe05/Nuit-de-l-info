<?php
    // Définit le type de contenu pour la réponse
    header('Content-Type: application/json');

    // Inclusion du fichier de fonctions CRUD (lib/qcm.php)
    require_once "qcm.php"; 

    // Récupération du paramètre id_question depuis l'URL
    $id_question = isset($_GET['id_question']) ? (int)$_GET['id_question'] : 1; 

    // Récupération des données de la question
    $question_data = GetQuestionById($conn, $id_question);
    $reponses_data = GetReponsesByQuestionId($conn, $id_question);
    $explication_data = GetExplicationByQuestionId($conn, $id_question);

    // Si la question existe, on construit le tableau de données
    if ($question_data) {
        
        // Ajout des réponses (avec le statut vrai/faux)
        $question_data['reponses'] = $reponses_data;
        
        // Ajout de l'explication (si elle existe)
        $question_data['explication'] = $explication_data ? $explication_data['explication'] : null;
        
        // On retire la propriété 'id' de l'explication et 'id_question' pour ne garder que le texte.
        
        // On retire l'id_question du tableau principal pour garder seulement les données de la question.
        unset($question_data['id_question']); 

        // Retourne les données encodées en JSON
        echo json_encode($question_data);
        
    } else {
        // Si la question n'existe pas, on retourne une erreur ou un objet vide
        echo json_encode(['error' => 'Question non trouvée']);
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);

?>