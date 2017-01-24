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
	
//Execution de la requette vers la base de données
	if(!empty($NomFonctionnalite) && !empty($CleProduit))

	{
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Fonctionnalite (NomFonctionnalite, CleProduit) WHERE Piece_idPiece = 'id'
			VALUES ('$NomFonctionnalite','$CleProduit')";
			$conn->exec($sql);
    		echo "Fonction ajoutée";
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