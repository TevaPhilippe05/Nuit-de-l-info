<?php
require 'db.php';

// CREATE
function createUser($nom, $password, $xp, $img) {
    global $pdo;
    $sql = "INSERT INTO user (nom, password, xp, Img_profil) VALUES (?, ?, ?, ?)";
    $pdo->prepare($sql)->execute([$nom, $password, $xp, $img]);
}

// READ
function getUser($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllUsers() {
    global $pdo;
    return $pdo->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
}

// UPDATE
function updateUser($id, $nom, $password, $xp, $img) {
    global $pdo;
    $sql = "UPDATE user SET nom=?, password=?, xp=?, Img_profil=? WHERE id=?";
    $pdo->prepare($sql)->execute([$nom, $password, $xp, $img, $id]);
}

// DELETE
function deleteUser($id) {
    global $pdo;
    $sql = "DELETE FROM user WHERE id=?";
    $pdo->prepare($sql)->execute([$id]);
}
?>