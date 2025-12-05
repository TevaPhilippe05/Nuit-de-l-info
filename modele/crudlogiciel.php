<?php
require 'db.php';

// CREATE
function createLogiciel($conn, $nom, $img, $description, $lien)
{

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO logiciel (nom, img, description, lien) VALUES (?, ?, ?, ?)"
    );

    // s = string, b = blob
    mysqli_stmt_bind_param($stmt, "sbss", $nom, $img, $description, $lien);

    // Envoie du blob
    if ($img !== null) {
        mysqli_stmt_send_long_data($stmt, 1, $img); // 1 = img
    }

    mysqli_stmt_execute($stmt);

    return mysqli_insert_id($conn);
}


// READ
function getLogiciel($conn, $id)
{
    $sql = "SELECT * FROM logiciel WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}


// READ ALL
function getAllLogiciels($conn)
{
    $sql = "SELECT * FROM logiciel";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// UPDATE
function updateLogiciel($conn, $id, $nom, $img, $description, $lien)
{

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE logiciel SET nom=?, img=?, description=?, lien=? WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, "sbssi", $nom, $img, $description, $lien, $id);

    if ($img !== null) {
        mysqli_stmt_send_long_data($stmt, 1, $img);
    }

    mysqli_stmt_execute($stmt);
}


// DELETE
function deleteLogiciel($conn, $id)
{
    mysqli_query($conn, "DELETE FROM logiciel WHERE id=$id");
}
