<?php
ob_start();
	
//définition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";

						
	
//Execution de la requette vers la base de données	
	if(!empty($_POST['nom']) && !empty($_POST['superficie']) && !empty($_SESSION))
    {
		$Nom = $_POST['nom'];
		$Superficie = $_POST['superficie'];
		$Id = $_SESSION['id'];


			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 		echo($_SESSION['pseudo']);
			$stmt= $conn->prepare("INSERT INTO piece (NomPiece, Surface, Utilsateur_idUtilsateur) VALUES ('$Nom', '$Superficie', '$Id')");  //prepare Sécurité
            $stmt->execute();
            header("Location: ../visuel/ma_maison.php");
            echo "OK";
            
            ob_clean();
            ob_end_flush();
        }
        else{
        }

?>