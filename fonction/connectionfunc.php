<?php
/////////////// Pour se connecter à la Base de donnée ///////////////

function connection(){
$servername = "localhost"; //adresse du serveur
$username = "root"; //identifiant
$password = "root"; //mdp
$dbname = "mydb"; //base à la quel il y accède
return $con = mysqli_connect($servername, $username, $password, $dbname);
}

?>