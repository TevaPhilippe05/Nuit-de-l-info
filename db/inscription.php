
<?php
include "db_connect.php";

if(isset($_POST['valider'])){
    $pseudo = $_POST['nom_uti'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (`nom_uti`, `password`) VALUES ('$pseudo', '$hashed_password')";
    mysqli_query($conn, $sql) or die("Erreur SQL ! ".mysqli_error($conn));
    mysqli_close($conn);
}
?>
<html>
    <head><title>Formulaire de saisie utilisateur </title></head>
    <body>
        <h1>Inscrivez-vous !</h1>
        <h2>Entrez les données demandées :</h2>
        <form name="inscription" method="post" action="form.php">
            Entrez votre nom_uti : <input type="text" name="nom_uti"/> <br/>
            Entrez votre password : <input type="password" name="password"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>