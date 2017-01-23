<?php
//définition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
//récupération de idPièce à partir de l'URL
	$idPiece=$_GET['id'];
	$NomFonctionnalite = $_POST['Fonctionnalite'];
	$CleProduit = $_POST['CleProduit'];

//on tente de se connecter à la base de données
	$conn = mysqli_connect($servername, $username, $password, $dbname);
//Execution de la requette vers la base de données
	if(!empty($NomFonctionnalite) && !empty($CleProduit))

	{

		$sql = "INSERT INTO Fonctionnalite (NomFonctionnalite, CleProduit)
		VALUES ('$NomFonctionnalite','$CleProduit')";
		mysqli_execute($sql);



		// affiche si il y a eu une erreur ou non: si pas d'erreur
		// Vérification des erreur
		if (mysqli_query($conn, $sql)) 
			{
		    	echo "Fonction ajouter";
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