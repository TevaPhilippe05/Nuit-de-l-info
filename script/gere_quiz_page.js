const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

let id_question = parseInt(urlParams.get("id_question")) || 1; // ID de la question actuelle
const reponsesContainer = document.querySelector(".reponses");
const questionTitre = document.querySelector(".question");
const resultatDiv = document.querySelector(".resultat");
const boutonSuivant = document.querySelector(".bt_suivant");
const imageQuestion = document.querySelector("#img_question");
let reponseSelectionee = false;
let reponseBloquee = false; 


let questionActuelle = null; 

/**
 * Charge les données de la question depuis le serveur et les affiche.
 * @param {number} id La question à charger.
 */
function afficherQuestion(id) {
    fetch(`lib/question_json.php?id_question=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                questionTitre.innerText = "Fin du quiz !";
                reponsesContainer.innerHTML = "";
                boutonSuivant.removeEventListener('click', gererQuestionSuivante);
                boutonSuivant.innerText = "Recommencer";
                boutonSuivant.addEventListener('click', () => window.location.href = "jeu-quiz.php?id_question=1");
                return;
            }

            questionActuelle = data;
            questionTitre.innerText = questionActuelle.question;
            
            // Affichage de l'image (si un champ 'image_url' existait dans la BDD)
            // if (questionActuelle.image_url) {
            //     imageQuestion.src = questionActuelle.image_url;
            // }

            afficherReponses(questionActuelle.reponses);
        })
        .catch(error => console.error("Erreur de chargement :", error));
}

/**
 * Affiche les boutons de réponse pour la question actuelle.
 * @param {Array<Object>} reponses Liste des objets réponse.
 */
function afficherReponses(reponses) {
    reponsesContainer.innerHTML = '';
    resultatDiv.setAttribute('hidden', ''); 
    resultatDiv.innerHTML = '';
    reponseBloquee = false;

    reponses.forEach(rep => {
        const bouton = document.createElement("div");
        bouton.className = "bt_reponse";
        bouton.innerText = rep.reponse;
        bouton.dataset.idReponse = rep.id;
        bouton.dataset.estVrai = rep.estVrai; 

        bouton.addEventListener('click', () => verifierReponse(bouton, rep));
        reponsesContainer.appendChild(bouton);
    });
}

/**
 * Vérifie la réponse sélectionnée et affiche le résultat/l'explication.
 * @param {HTMLElement} bouton L'élément HTML du bouton cliqué.
 * @param {Object} reponse L'objet réponse correspondant.
 */
function verifierReponse(bouton, reponse) {
    if (reponseBloquee) return; 

    reponseBloquee = true;
    const estCorrect = parseInt(reponse.estVrai) === 1;

    
    resultatDiv.removeAttribute('hidden');

    if (estCorrect) {
        bouton.classList.add('reponse-correcte');
        resultatDiv.innerHTML = `<strong>Bonne réponse !</strong>`;
    } else {
        bouton.classList.add('reponse-fausse');
        resultatDiv.innerHTML = `<strong>Mauvaise réponse !</strong>`;

        
        const tousLesBoutons = reponsesContainer.querySelectorAll('.bt_reponse');
        tousLesBoutons.forEach(btn => {
            if (parseInt(btn.dataset.estVrai) === 1) {
                btn.classList.add('reponse-correcte');
            }
        });
    }

    // Ajout de l'explication
    if (questionActuelle.explication) {
        resultatDiv.innerHTML += `<br><p id="contexte"><strong>Explication :</strong> ${questionActuelle.explication}</p>`;
    }

    // Désactive les clics sur tous les boutons de réponse après la vérification
    reponsesContainer.querySelectorAll('.bt_reponse').forEach(btn => {
        btn.style.pointerEvents = 'none';
    });
}

/**
 * Passe à la question suivante.
 */
function gererQuestionSuivante() {
    if (!reponseBloquee) {
        alert("Veuillez sélectionner une réponse avant de continuer.");
        return;
    }
    // Incrémente l'ID et recharge la page pour le nouvel ID
    id_question += 1; 
    window.location.href = `jeu-quiz.php?id_question=${id_question}`;
}

boutonSuivant.addEventListener("click", gererQuestionSuivante);

// Lance le quiz en affichant la première question
afficherQuestion(id_question);