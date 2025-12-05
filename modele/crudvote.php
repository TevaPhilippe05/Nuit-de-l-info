<?php
require 'db.php';

// CREATE
function addVote($id_user, $id_logiciel) {
    global $pdo;
    $sql = "INSERT INTO vote (id_user, id_logiciel) VALUES (?, ?)";
    $pdo->prepare($sql)->execute([$id_user, $id_logiciel]);
}

// READ
function getVote($id_user, $id_logiciel) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM vote WHERE id_user=? AND id_logiciel=?");
    $stmt->execute([$id_user, $id_logiciel]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllVotes() {
    global $pdo;
    return $pdo->query("SELECT * FROM vote")->fetchAll(PDO::FETCH_ASSOC);
}

// DELETE
function deleteVote($id_user, $id_logiciel) {
    global $pdo;
    $sql = "DELETE FROM vote WHERE id_user=? AND id_logiciel=?";
    $pdo->prepare($sql)->execute([$id_user, $id_logiciel]);
}
?>