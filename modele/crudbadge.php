<?php
require 'db.php';

// CREATE
function createBadge($conn,$nom, $img, $description) {
    $sql = "INSERT INTO badge (nom, img, description) VALUES ('$nom', '$img', '$description')";
    $result =mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ
function getBadge($conn,$id) {
    $sql = "SELECT * FROM badge WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllBadges($conn) {
    $sql = "SELECT * FROM badge";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// UPDATE
function updateBadge($conn,$id, $nom, $img, $description) {
    $sql = "UPDATE badge SET nom='$nom', img='$img', description='$description' WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// DELETE
function deleteBadge($conn,$id) {
    $sql = "DELETE FROM badge WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>