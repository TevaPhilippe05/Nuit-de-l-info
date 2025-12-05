<?php
require 'db.php';

// CREATE
function addVote($conn,$id_user, $id_logiciel) {
    $sql = "INSERT INTO vote (id_user, id_logiciel) VALUES ($id_user, $id_logiciel)";
    mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}

// READ
function getVote($conn,$id_user, $id_logiciel) {
    $sql = "SELECT * FROM vote WHERE id_user=$id_user AND id_logiciel=$id_logiciel";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllVotes($conn) {
    $sql = "SELECT * FROM vote";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// DELETE
function deleteVote($conn,$id_user, $id_logiciel) {
    $sql = "DELETE FROM vote WHERE id_user=$id_user AND id_logiciel=$id_logiciel";
    mysqli_query($conn, $sql);
}
?>