<?php
require 'db.php';

// CREATE
function createLogiciel($conn,$nom, $img, $description, $lien) {
    $sql = "INSERT INTO logiciel (nom, img, description, lien) VALUES ('$nom', '$img', '$description', '$lien')";
    mysqli_query($conn, $sql);
}

// READ
function getLogiciel($conn,$id) {
    $sql = "SELECT * FROM logiciel WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllLogiciels($conn) {
    $sql = "SELECT * FROM logiciel";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// UPDATE
function updateLogiciel($conn,$id, $nom, $img, $description, $lien) {
    $sql = "UPDATE logiciel SET nom='$nom', img='$img', description='$description', lien='$lien' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// DELETE
function deleteLogiciel($conn,$id) {
    $sql = "DELETE FROM logiciel WHERE id=$id";
    mysqli_query($conn, $sql);
}
?>