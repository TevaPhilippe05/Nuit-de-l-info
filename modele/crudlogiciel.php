<?php
require 'db.php';

// CREATE
function createLogiciel($nom, $img, $description, $lien) {
    global $pdo;
    $sql = "INSERT INTO logiciel (nom, img, description, lien) VALUES (?, ?, ?, ?)";
    $pdo->prepare($sql)->execute([$nom, $img, $description, $lien]);
}

// READ
function getLogiciel($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM logiciel WHERE id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllLogiciels() {
    global $pdo;
    return $pdo->query("SELECT * FROM logiciel")->fetchAll(PDO::FETCH_ASSOC);
}

// UPDATE
function updateLogiciel($id, $nom, $img, $description, $lien) {
    global $pdo;
    $sql = "UPDATE logiciel SET nom=?, img=?, description=?, lien=? WHERE id=?";
    $pdo->prepare($sql)->execute([$nom, $img, $description, $lien, $id]);
}

// DELETE
function deleteLogiciel($id) {
    global $pdo;
    $sql = "DELETE FROM logiciel WHERE id=?";
    $pdo->prepare($sql)->execute([$id]);
}
?>