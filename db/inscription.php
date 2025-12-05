<?php
include "db_connect.php";

if(isset($_POST['valider'])){
    $pseudo = $_POST['nom_uti'];
    $password = $_POST['password'];

    if(empty($pseudo) || empty($password)){
        die("Nom d’utilisateur et mot de passe requis !");
    }

    $conn = connect();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (nom_uti, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $pseudo, $hashed_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    mysqli_close($conn);
}
?>
<html>
<head><title>Formulaire de saisie utilisateur</title></head>
<body>
<h1>Inscrivez-vous !</h1>
<h2>Entrez les données demandées :</h2>
<form name="inscription" method="post" action="form.php">
    Entrez votre nom_uti : <input type="text" name="nom_uti" required/> <br/>
    Entrez votre password : <input type="password" name="password" required/><br/>
    <input type="submit" name="valider" value="OK"/>
</form>
</body>
</html>