const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

let id_question = parseInt(urlParams.get("id_question")) || 0; // ID de la question actuelle
const reponsesContainer = document.querySelector(".reponses");
const questionTitre = document.querySelector(".question");
const resultatDiv = document.querySelector(".resultat");
const boutonSuivant = document.querySelector(".bt_suivant");
const imageQuestion = document.querySelector("#img_question");
const resTitre = document.querySelector(".resultat-titre");
let reponseSelectionee = false;
let reponseBloquee = false; 


function create(tag, container, text=null) {
    const element = document.createElement(tag);
    if (tag === "img") {
        element.src = "img/tux-linux-penguin.gif";
        element.alt = "linux-penguin";
    }
    element.innerText = text;
    container.appendChild(element);
    return element;
}

let descriptionQuiz = document.querySelector(".description-quiz");

function presenterQuiz() {
    if (id_question === 0) {
        questionTitre.innerText = "canard/quiz.sh : Bienvenue au quiz sur le logiciel libre !";
        resTitre.style.display = "none";
        descriptionQuiz.style.display = "block";
        
        reponsesContainer.innerHTML = "<p>Cliquez sur 'Commencer' pour débuter le quiz.</p>";
        boutonSuivant.innerText = "Commencer";
        boutonSuivant.addEventListener("click", () => {
            id_question = 1; 
            window.location.href = `jeu-quiz.php?id_question=${id_question}`;
        });
    }
}

let questionActuelle = null; 





function afficherQuestion(id) {
    descriptionQuiz.setAttribute('hidden', '');
    //resTitre.style.display = "block";
    //descriptionQuiz.style.display = "none";

    fetch(`lib/question_json.php?id_question=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                questionTitre.innerText = "Fin du quiz !";
                afficherMessageFinQuiz();
                reponsesContainer.innerHTML = "";
                boutonSuivant.removeEventListener('click', gererQuestionSuivante);
                boutonSuivant.innerText = "Revenir au site";
                boutonSuivant.addEventListener('click', () => window.location.href = "index.html");
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

        bouton.addEventListener('click', () => { resTitre.removeAttribute('hidden');  verifierReponse(bouton, rep); });
        reponsesContainer.appendChild(bouton);
    });
}



function verifierReponse(bouton, reponse) {
    if (reponseBloquee){
        return; 
    }

    reponseBloquee = true;
    const estCorrect = parseInt(reponse.estVrai) === 1;

    
    resultatDiv.removeAttribute('hidden');
    create("img", resultatDiv);

    if (estCorrect) {
        bouton.classList.add('reponse-correcte');
        
        resultatDiv.innerHTML = `<p>Bonne réponse !</p>`;
    } else {
        bouton.classList.add('reponse-fausse');
        
        resultatDiv.innerHTML = `<p>Mauvaise réponse !</p>`;

        
        const tousLesBoutons = reponsesContainer.querySelectorAll('.bt_reponse');
        tousLesBoutons.forEach(btn => {
            if (parseInt(btn.dataset.estVrai) === 1) {
                btn.classList.add('reponse-correcte');
            }
        });
    }

    
    if (questionActuelle.explication) {
        resultatDiv.innerHTML += `<br><p id="contexte"><strong>Explication :</strong> ${questionActuelle.explication}</p>`;
    }


    reponsesContainer.querySelectorAll('.bt_reponse').forEach(btn => {
        btn.style.pointerEvents = 'none';
    });
}

function gererQuestionSuivante() {
    if (!reponseBloquee && id_question !== 0) {
        alert("Veuillez sélectionner une réponse avant de continuer.");
        return;
    }
    
    id_question += 1; 
    window.location.href = `jeu-quiz.php?id_question=${id_question}`;
}

boutonSuivant.addEventListener("click", gererQuestionSuivante);

//afficherQuestion(id_question);

function afficherMessageFinQuiz() {
    document.querySelector(".msg-fin").removeAttribute("hidden");
}

if (id_question === 0) {
    presenterQuiz();


} 
//else if(id_question === 11){
    //afficherMessageFinQuiz();
//}

else {
    
    afficherQuestion(id_question);
}

