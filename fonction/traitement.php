<html>
	<head>
		<title>Ma Maison</title>
		<meta >
		<link rel="stylesheet" type ="text/css"
		media="screen" href="style_maison.css"
		</meta>
	</head>
	<body>
		<?php
		// Parametres mysql � remplacer par les v�tres
			include ("../visuel/top.php");
		    $dbname = 'mydb';
		    $host='localhost';
		    $user='root';
		    $pass='root';

		    $db = mysqli_connect($host, $user, $pass, $dbname);

		//    $db->query("SET NAMES UTF8");

		// Messages d'erreur
			$msg_erreur = "Erreur. Les champs suivants doivent �tre obligatoirement remplis :
			<br/><br/>";
			$msg_ok = "La piece est maintenant disponible.";
			$message = $msg_erreur;
			if (empty($_POST['nom'])) {
			  $message .= "Nom de la pi�ce<br/>";
			   echo $message;
			}
			else {
			 $nom = $_POST['nom'];
			 $sql = "INSERT INTO piece (NomPiece, Surface, Utilsateur_idUtilsateur) 
			 VALUES ('$nom', 45, 1)";
			 $res = mysqli_query($db, $sql);	 
			 if ($res) {
		    		echo $msg_ok;
		 		 } 
		 	 else {
		   		 echo mysqli_error($db);
		  		}
		  	}
		include("../visuel/bottom.php");
		?>
	</body>
</html>