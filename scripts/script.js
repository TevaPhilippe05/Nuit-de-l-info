/////////////////////////////////// FORMULAIRES ////////////////////////////////////////

const sel_form_app = document.querySelector("#sel-form-app");
const txt_form_app = document.querySelector("#txt-form-app");
const new_form_app = document.querySelector("#new-form-app");
const btn_sel_conf_app = document.querySelector("#btn-sel-conf-app");
const btn_new_conf_app = document.querySelector("#btn-new-conf-app");
const btn_add_app = document.querySelector("#btn-add-app");

const sel_form_alt = document.querySelector("#sel-form-alt");
const txt_form_alt = document.querySelector("#txt-form-alt");
const new_form_alt = document.querySelector("#new-form-alt");
const btn_sel_conf_alt = document.querySelector("#btn-sel-conf-alt");
const btn_new_conf_alt = document.querySelector("#btn-new-conf-alt");
const btn_add_alt = document.querySelector("#btn-add-alt");
const opt_app_form = document.querySelector("#app");

const barre_progression = document.querySelector(".progression-ajout .barre-ajout");

btn_sel_conf_app.addEventListener("click", function() {
    sel_form_app.classList.add("cache-form");
    txt_form_app.classList.add("cache-form");
    sel_form_alt.classList.remove("cache-form");
    txt_form_alt.classList.remove("cache-form");
    barre_progression.style.width = "100%"
});

btn_new_conf_app.addEventListener("click", function() {
    new_form_app.classList.add("cache-form");
    sel_form_alt.classList.remove("cache-form");
    txt_form_alt.classList.remove("cache-form");
    barre_progression.style.width = "100%"
});

btn_add_app.addEventListener("click", function() {
    sel_form_app.classList.add("cache-form");
    txt_form_app.classList.add("cache-form");
    new_form_app.classList.remove("cache-form");
});

btn_add_alt.addEventListener("click", function() {
    sel_form_alt.classList.add("cache-form");
    txt_form_alt.classList.add("cache-form");
    new_form_alt.classList.remove("cache-form");
});


