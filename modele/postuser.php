<?php
require 'db.php';

// CREATE
function addPostUser($id_logiciel, $id_user) {
    global $pdo;
    $sql = "INSERT INTO postuser (id_logiciel, id_user) VALUES (?, ?)";
    $pdo->prepare($sql)->execute([$id_logiciel, $id_user]);
}

// READ
function getPostUser($id_logiciel, $id_user) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM postuser WHERE id_logiciel=? AND id_user=?");
    $stmt->execute([$id_logiciel, $id_user]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllPostUser() {
    global $pdo;
    return $pdo->query("SELECT * FROM postuser")->fetchAll(PDO::FETCH_ASSOC);
}

// DELETE
function deletePostUser($id_logiciel, $id_user) {
    global $pdo;
    $sql = "DELETE FROM postuser WHERE id_logiciel=? AND id_user=?";
    $pdo->prepare($sql)->execute([$id_logiciel, $id_user]);
}
?>