
const queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);

var id_question = urlParams.get("id_question");

id_question = id_question || 1; // valeur par défaut si pas de paramètre

function create(tag, container, text = null) {
    const element = document.createElement(tag);
    element.innerText = text;
    container.appendChild(element);
    return element;
}


let exemple_id_question = parseInt(id_question);
let bouton_suivant = document.querySelector(".bt_suivant");


let choix_1 = document.querySelector("#rep1");
let choix_2 = document.querySelector("#rep2");
let choix_3 = document.querySelector("#rep3");
let choix_4 = document.querySelector("#rep4");


let question = document.querySelector(".question");

function afficherQuestion(id_question) {
    // fetch sur le json avec id_question en param
    //fetch("../lib/question_json.php?id_question=" + id_question)
    
    fetch("../lib/question_json.php").then(response => response.json()).then(data => {
        console.log(data);
    });


}

afficherQuestion(1);

function afficherReponsesFromQuestion(id_question) {
    // fetch sur le json
    choix_1.innerText = "Réponse 1"; // mettre les vraies valeurs
    choix_2.innerText = "Réponse 2";
    choix_3.innerText = "Réponse 3";
    choix_4.innerText = "Réponse 4";
}
//afficherReponsesFromQuestion(1);

let image = document.querySelector("#img_question");

function afficherImageFromQuestion(id_question) {
    // fetch sur le json avec id_qestion en param
}

let reponseSelectionee = false;
let reponseChoix = "";

function choix_reponse() {
    choix_1.addEventListener("click", function () {
        reponseSelectionee = true;
        reponseChoix = choix_1.innerHTML;
        console.log(reponseChoix);
    })

    choix_2.addEventListener("click", function () {
        reponseSelectionee = true;
        reponseChoix = choix_2.innerHTML;
        console.log(reponseChoix);
    })

    choix_3.addEventListener("click", function () {
        reponseSelectionee = true;
        reponseChoix = choix_3.innerHTML;
        console.log(reponseChoix);
    })
    choix_4.addEventListener("click", function () {
        reponseSelectionee = true;
        reponseChoix = choix_4.innerHTML;
        console.log(reponseChoix);
    })
}

choix_reponse();

function reponseFinale() {
    // fetch sur le json pour savoir si estVrai



    if (reponseSelectionee && verifier_veraciter()) {
        document.querySelector(".resultat").innerHTML = "Bonne réponse !";
    }
    else {
        document.querySelector(".resultat").innerHTML = "Mauvaise réponse !";
    }

}


// a activé seulement si true dans reponse avec estVrai
function questionSuivante() {
    bouton_suivant.addEventListener("click", function () {

        if (!reponseSelectionee) {
            alert("Veuillez sélectionner une réponse avant de continuer.");
            window.location.href = "qcm.html?id_question=" + exemple_id_question;
        
        }
        else{
            exemple_id_question += 1; // mettre du get
            window.location.href = "qcm.html?id_question=" + exemple_id_question;
        }
        
    });
}

questionSuivante();
