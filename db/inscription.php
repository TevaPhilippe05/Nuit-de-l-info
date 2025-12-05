
<?php
include "db_connect.php";
?>
<html>
    <head><title>Formulaire de saisie utilisateur </title></head>
    <body>
        <h1>Inscrivez-vous !</h1>
        <h2>Entrez les données demandées :</h2>
        <form name="inscription" method="post" action="form.php">
            Entrez votre nom_uti : <input type="text" name="nom_uti"/> <br/>
            Entrez votre password : <input type="text" name="password"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
    </body>
</html>

<?php
//On récupère les valeurs entrées par l'utilisateur :
$pseudo=$_POST['nom_uti'];
$password=$_POST['password'];
 
//On se connecte
connect();
 
//On prépare la commande sql d'insertion
$sql = 'INSERT INTO users VALUES("","'.$pseudo.'","'.password_hash($password).'")';
 
/*on lance la commande (mysql_query) et au cas où, 
on rédige un petit message d'erreur si la requête ne passe pas (or die) 
(Message qui intègrera les causes d'erreur sql)*/
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
 
// on ferme la connexion
mysql_close();
?>