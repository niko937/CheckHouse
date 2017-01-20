<?php
//définition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
//on tente de se connecter à la base de données
	$conn = mysqli_connect($servername, $username, $password, $dbname);
//Execution de la requette vers la base de données
	$sql = "INSERT INTO Fonctionnalite (NomFonctionnalite, CleProduit) WHERE idPiece="?"
VALUES ('{$_POST['NomFonctionnalite']}','{$_POST['CleProduit']}','{$_POST['Mail']}','{$_POST['Mdp']}','{$_POST['Rue']}','{$_POST['Numero']}','{$_POST['CodePostal']}')";

//check s'il y a erreur ou non 
if (mysqli_query($conn, $sql)) {
    echo "Félicitation kamarade";
} 
//si erreur indique l'erreur, coupe la connexion
else 
{
    echo "Error :'( " . $sql . "<br>" . mysqli_error($conn);
}
//ferme la connection
mysqli_close($conn);



?>