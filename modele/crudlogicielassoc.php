<?php
require 'db.php';

// CREATE
function addLogicielAssocie($conn,$id_logiciel, $id_associe) {
    $sql = "INSERT INTO logiciels_associes (id_logiciel, id_associe) VALUES ($id_logiciel, $id_associe)";
    mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}

// READ ONE
function getLogicielAssocie($conn,$id_logiciel, $id_associe) {
    $sql = "SELECT * FROM logiciels_associes WHERE id_logiciel=$id_logiciel AND id_associe=$id_associe";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllLogicielsAssocies($conn) {
    $sql = "SELECT * FROM logiciels_associes";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// DELETE
function deleteLogicielAssocie($conn,$id_logiciel, $id_associe) {
    $sql = "DELETE FROM logiciels_associes WHERE id_logiciel=$id_logiciel AND id_associe=$id_associe";
    mysqli_query($conn, $sql);
}

function getAlternativesForLogiciel($conn, $id_logiciel) {
    $sql = "
        SELECT l.*
        FROM logiciels_associes a
        JOIN logiciel l ON l.id = a.id_associe
        WHERE a.id_logiciel = $id_logiciel
    ";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>