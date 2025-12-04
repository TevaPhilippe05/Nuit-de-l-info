
var url = new URL("http://foo.bar/?x=1&y=2");
var params = new URLSearchParams(window.location.search);
//var id_quiz = params.get("id_quiz");
var id_question = params.get("id_question");

function create(tag, container, text=null) {
    const element = document.createElement(tag);
    element.innerText = text;
    container.appendChild(element);
    return element;
}

let bouton_suivant = document.querySelector(".bt_suivant");

