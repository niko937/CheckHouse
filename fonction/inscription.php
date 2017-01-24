<?php
/////////////// Pour se connecter à la Base de donnée ///////////////
$servername = "localhost"; //adresse du serveur
$username = "root"; //identifiant
$password = "root"; //mdp
$dbname = "mydb"; //base à la quel il y accède

	///////DEFINITION DES VARIABLES////////

$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$mail = $_POST['Mail'];
$mdp = $_POST['Mdp'];
$adresse = $_POST['Adresse'];
$cdp = $_POST['CodePostal'];
$cle = $_POST['cle'];


///////////////vérification des inputs///////////////
 
if(!empty($nom) && !empty($prenom) && !empty($mdp) && !empty($adresse) && !empty($cdp)  && !empty($mail))
{
	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = ("INSERT INTO Utilsateur (Nom, Prenom, Mail, Mdp, Adresse, CodePostal)
		VALUES ('$nom','$prenom','$mail','$mdp','$adresse','$cdp')");
		$conn->exec($sql);
		echo "Votre compte a bien été crée";
	}
	catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }

	$conn = null;
}
else
{
	echo "Veuilliez saisir tous les champs du formulaire";
}

?>