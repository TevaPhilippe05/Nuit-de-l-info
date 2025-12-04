
const queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
//var id_quiz = params.get("id_quiz");
var id_question = urlParams.get("id_question");

function create(tag, container, text=null) {
    const element = document.createElement(tag);
    element.innerText = text;
    container.appendChild(element);
    return element;
}


let bouton_suivant = document.querySelector(".bt_suivant");
bouton_suivant.addEventListener("click", function() {
    exemple_id_question += 1; // mettre du get
    window.location.href = "qcm.html?id_question=" + exemple_id_question;
});


let choix_1 = document.querySelector("#rep1");
let choix_2 = document.querySelector("#rep2");
let choix_3 = document.querySelector("#rep3");
let choix_4 = document.querySelector("#rep4");


