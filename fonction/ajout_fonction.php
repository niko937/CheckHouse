<?php
require ('fonctionnalite.php');
//définition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
//récupération de idPièce à partir de l'URL
	$idPiece = $_GET['id'];
	$NomFonctionnalite = $_POST['Fonctionnalite'];
	$CleProduit = $_POST['CleProduit'];
	$idUtilisateur = recupIdUtilisateurFromPiece($idPiece);

	//echo $idPiece;


//on tente de se connecter à la base de données
	
//Execution de la requette vers la base de données
	if(!empty($NomFonctionnalite) && !empty($CleProduit))

	{
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   	 		$stmt= $conn->prepare("SELECT * FROM fonctionref WHERE NomFonction ='$NomFonctionnalite'");
        	$stmt->execute();
       
        	while ($data = $stmt->fetch())
        	{
            	$ReferenceFonction = $data['Reference'];
            	//echo $Reference;
            	//echo $data['Surface'];
            	//echo "<br>";
        	}
        	$stmt->closeCursor();

			$sql = "INSERT INTO Fonctionnalite (NomFonctionnalite, ReferenceFonction, CleProduit, Piece_idPiece, Piece_Utilsateur_idUtilsateur)
			VALUES ('$NomFonctionnalite','$ReferenceFonction','$CleProduit','$idPiece', '$idUtilisateur')";
			$conn->exec($sql);

			$stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE CleProduit ='$CleProduit'");
        	$stmt->execute();
       
        	while ($data = $stmt->fetch())
        	{
            	$idFonctionnalite = $data['idFonctionnalite'];
        	}
        	$stmt->closeCursor();


    		//echo "Fonction ajoutée";
    		$sql = "INSERT INTO capteuractionneur (Type, Fonctionnalite_idFonctionnalite, Fonctionnalite_Piece_idPiece, Fonctionnalite_Piece_Utilsateur_idUtilsateur)
			VALUES ('$ReferenceFonction','$idFonctionnalite','$idPiece','$idUtilisateur')";
			$conn->exec($sql);

    		header("Location: ../visuel/parametre.php?id=".$idPiece);
    		exit;
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