<?php
//ALEX
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
$rue = $_POST['Rue'];
$numero = $_POST['Numero'];
$cdp = $_POST['CodePostal'];
$cle = $_POST['cle'];



// Ont créer une connection vers la base de donée 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Ont vérifie que la clée produit correspond bien 

/*
mysqli_query($conn, "SELECT * FROM 'ProduitReference'");
echo "$verif";
if (($cle) == ($verif))
{
	echo "YATAAAA";
}
	else
	{
		echo "FUCK TOI";
	}
*/

///////////////vérification des inputs///////////////
 
if(!empty($nom) && !empty($prenom) && !empty($mdp) && !empty($rue) && !empty($numero) && !empty($cdp)  && !empty($mail))

	{

		///////////////ont écrit dans la base de donnée ///////////////

		/* syntaxe type : $sql = "INSERT INTO `utilsateur` (Nom,Prenom)
		VALUES ('{$_POST['Nom']}','{$_POST['Prenom']}' )";*/


		$sql = "INSERT INTO Utilsateur (Nom, Prenom, Mail, Mdp, Rue, Numero, CodePostal)
		VALUES ('$nom','$prenom','$mail','$mdp','$rue','$numero','$cdp')";
		mysqli_execute($sql);



		// affiche si il y a eu une erreur ou non: si pas d'erreur
		// Vérification des erreur
		if (mysqli_query($conn, $sql)) 
			{
		    	echo "Votre compte a bien été créé";
			} 
		//si erreur indique l'erreur et tue la connectio
		else 
			{
		    		echo "Error :'( " . $sql . "<br>" . mysqli_error($conn);
			}
		//fermer la connection
		mysqli_close($conn);
	}
else
	{
	echo "Veuilliez saisir tous les champs du formulaire";
	}





?>