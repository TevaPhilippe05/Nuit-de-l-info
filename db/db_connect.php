<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');
function connect(){
    $conn = mysqli_connect("localhost","root","ubuntu54.38.0.127","connexion");
    mysqli_set_charset($conn,"utf8");
    return $conn;
}
?>