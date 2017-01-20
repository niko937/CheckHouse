<?php
// Parametres mysql à remplacer par les vôtres

    $dbname = 'mydb';
    $host='localhost';
    $user='root';
    $pass='root';

    $db = mysqli_connect($host, $user, $pass, $dbname);

//    $db->query("SET NAMES UTF8");

// Messages d'erreur
	$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :
	<br/><br/>";
	$msg_ok = "Votre demande a bien été prise en compte.";
	$message = $msg_erreur;
	if (empty($_POST['nom'])) {
	  $message .= "Nom de la pièce<br/>";
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
?>