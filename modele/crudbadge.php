<?php
require 'db.php';

// CREATE
function createBadge($nom, $img, $description) {
    global $pdo;
    $sql = "INSERT INTO badge (nom, img, description) VALUES (?, ?, ?)";
    $pdo->prepare($sql)->execute([$nom, $img, $description]);
}

// READ
function getBadge($id) {
    global $pdo;
    $sql = "SELECT * FROM badge WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllBadges() {
    global $pdo;
    return $pdo->query("SELECT * FROM badge")->fetchAll(PDO::FETCH_ASSOC);
}

// UPDATE
function updateBadge($id, $nom, $img, $description) {
    global $pdo;
    $sql = "UPDATE badge SET nom=?, img=?, description=? WHERE id=?";
    $pdo->prepare($sql)->execute([$nom, $img, $description, $id]);
}

// DELETE
function deleteBadge($id) {
    global $pdo;
    $sql = "DELETE FROM badge WHERE id=?";
    $pdo->prepare($sql)->execute([$id]);
}
?>