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
		// Parametres mysql à remplacer par les vôtres
			include ("../visuel/top.php");
		    $dbname = 'mydb';
		    $host='localhost';
		    $user='root';
		    $pass='root';

		    $db = mysqli_connect($host, $user, $pass, $dbname);

		//    $db->query("SET NAMES UTF8");
		     $idPiece = $_GET['id'];
			 $sql = "DELETE FROM `piece` WHERE `piece`.`idPiece` = $idPiece";
			 $res = mysqli_query($db, $sql);	 
			 if ($res) {
		    		echo "La piece a été supprimée.";
		 		 } 
		 	 else {
		   		 echo mysqli_error($db);
		  		}
		include("../visuel/bottom.php");
		?>
	</body>
</html>