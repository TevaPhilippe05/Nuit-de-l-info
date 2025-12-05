<?php
require 'db.php';

// CREATE
function addLogicielAssocie($id_logiciel, $id_associe) {
    global $pdo;
    $sql = "INSERT INTO logiciels_associes (id_logiciel, id_associe) VALUES (?, ?)";
    $pdo->prepare($sql)->execute([$id_logiciel, $id_associe]);
}

// READ ONE
function getLogicielAssocie($id_logiciel, $id_associe) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM logiciels_associes WHERE id_logiciel=? AND id_associe=?");
    $stmt->execute([$id_logiciel, $id_associe]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// READ ALL
function getAllLogicielsAssocies() {
    global $pdo;
    return $pdo->query("SELECT * FROM logiciels_associes")->fetchAll(PDO::FETCH_ASSOC);
}

// DELETE
function deleteLogicielAssocie($id_logiciel, $id_associe) {
    global $pdo;
    $sql = "DELETE FROM logiciels_associes WHERE id_logiciel=? AND id_associe=?";
    $pdo->prepare($sql)->execute([$id_logiciel, $id_associe]);
}
?>