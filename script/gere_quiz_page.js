
const queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);

var id_question = urlParams.get("id_question");

id_question = id_question || 1; // valeur par défaut si pas de paramètre

function create(tag, container, text=null) {
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

function afficherQuestion(id_question){
    // fetch sur le json avec id_question en param
}

function afficherReponsesFromQuestion(id_question){
    // fetch sur le json
    choix_1.innerText = "Réponse 1"; // mettre les vraies valeurs
    choix_2.innerText = "Réponse 2";
    choix_3.innerText = "Réponse 3";
    choix_4.innerText = "Réponse 4";
}
//afficherReponsesFromQuestion(1);

let image = document.querySelector("#img_question");

function afficherImageFromQuestion(id_question){
    // fetch sur le json avec id_qestion en param
}

function reponseFinale(){
    // fetch sur le json pour savoir si estVrai

    if (reponseSelectionee){
        document.querySelector(".resultat").innerHTML = "Bonne réponse !";
    }
    else{
        document.querySelector(".resultat").innerHTML = "Mauvaise réponse !";
    }

}

function questionSuivante() {
    
    // a activé seulement si true dans reponse avec estVrai
    bouton_suivant.addEventListener("click", function() {
        exemple_id_question += 1; // mettre du get
        window.location.href = "qcm.html?id_question=" + exemple_id_question;
    });
}

