<?php
ob_start();
//d�finition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
//r�cup�ration de idPi�ce � partir de l'URL
	$Nom = $_POST['nom'];
	//$idUtilisateur = recupIdUtilisateurFromPiece($idPiece);



//on tente de se connecter � la base de donn�es
	
//Execution de la requette vers la base de donn�es
	
	

			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt= $conn->prepare("INSERT INTO piece (NomPiece, Surface, Utilsateur_idUtilsateur) VALUES ('$Nom', 45, 1)");  //S�curit�
            $stmt->execute();
            header("Location: ../visuel/ma_maison.php");
            
            ob_clean();
            ob_end_flush();
?>

