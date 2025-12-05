<?php
require 'db.php';

// CREATE
function createUser($conn,$nom, $password, $xp, $img) {
    $sql = "INSERT INTO user (nom, password, xp, Img_profil) VALUES ('$nom', '$password', $xp, '$img')";
    mysqli_query($conn, $sql);
    return mysqli_insert_id($conn);
}

// READ
function getUser($conn,$id) {
    $sql = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// READ ALL
function getAllUsers($conn) {
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// UPDATE
function updateUser($conn,$id, $nom, $password, $xp, $img) {
    $sql = "UPDATE user SET nom='$nom', password='$password', xp=$xp, Img_profil='$img' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// DELETE
function deleteUser($conn,$id) {
    $sql = "DELETE FROM user WHERE id=$id";
    mysqli_query($conn, $sql);
}
?>