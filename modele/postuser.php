<?php
require 'db.php';

// CREATE
function addPostUser($conn,$id_logiciel, $id_user) {
    //global $pdo;
    $sql = "INSERT INTO postuser (id_logiciel, id_user) WHERE id_logiciel=$id_logiciel AND id_user=$id_user";
    //$pdo->prepare($sql)->execute([$id_logiciel, $id_user]);
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ
function getPostUser($conn,$id_logiciel, $id_user) {
    $sql = "SELECT * FROM postuser WHERE id_logiciel=$id_logiciel AND id_user=$id_user";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllPostUser($conn) {
    $sql = "SELECT * FROM postuser";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// DELETE
function deletePostUser($conn,$id_logiciel, $id_user) {
    $sql = "DELETE FROM postuser WHERE id_logiciel=$id_logiciel AND id_user=$id_user";
    mysqli_query($conn, $sql);
}
?>