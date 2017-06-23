<?php 
//Récupère les logs pour traitement des données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

//http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

//echo "Raw Data:<br />";
//echo("$data");



//Déomposer la chaîne de caractère en tableaux de trames
$TypeSearch = 4;
$idCapteurSearch = 2;
$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++)
{

	$matrice[$i] = list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
	sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
	//echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
	if($matrice[$i][3] == $TypeSearch)
	{
		//if($matrice[$i][4] == $idCapteurSearch)
		//{
			$idPiece = $matrice[$i][1];
			echo $idPiece;
			echo ' ';
			$Type = $matrice[$i][3];
			echo $Type;
			echo ' ';
			$idCapteur = $matrice[$i][4];
			echo $idCapteur;
			echo ' ';
			$Valeur = $matrice[$i][5];
			echo $Valeur;
			echo ' ';
			$year = $matrice[$i][8];
			echo $year; 
			echo '-';
			$month = $matrice[$i][9];
			echo $month;
			echo '-';
			$day = $matrice[$i][10];
			echo $day;
			echo ' ';
			$hour = $matrice[$i][11];
			echo $hour;
			echo ':';
			$min = $matrice[$i][12];
			echo $min;
			echo ':';
			$sec = $matrice[$i][13];
			echo $sec;
			echo' ';
			$date =$matrice[$i][8]."-".$matrice[$i][9]."-".$matrice[$i][10]." ".$matrice[$i][11].":".$matrice[$i][12].":".$matrice[$i][13];
			//echo $date;
			echo '<br>';


			try
			{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    			// set the PDO error mode to exception
   	 			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   	 			$stmt= $conn->prepare("SELECT * FROM capteuractionneur WHERE Fonctionnalite_Piece_idPiece ='$idPiece' AND idCapteurActionneur = '$idCapteur'");
        		$stmt->execute();
       
        		while ($data = $stmt->fetch())
        		{
            		$idFonctionnalite = $data['Fonctionnalite_idFonctionnalite'];

            		$idUtilisateur = $data['Fonctionnalite_Piece_Utilsateur_idUtilsateur'];

        		}
        		$stmt->closeCursor();


				$sql = "INSERT INTO donnee (Valeur, DateHeure, CapteurActionneur_idCapteurActionneur, CapteurActionneur_Fonctionnalite_idFonctionnalite, 
				CapteurActionneur_Fonctionnalite_Piece_idPiece, CapteurActionneur_Fonctionnalite_Piece_Utilsateur_idUtilsateur)
				VALUES ('$Valeur','$date','$idCapteur','$idFonctionnalite','$idPiece','$idUtilisateur')";
				$conn->exec($sql);

    			//header("Location: ../visuel/parametre.php?id=".$idPiece);
    			//exit;
			}
			catch(PDOException $e)
    		{
    			echo $sql . "<br>" . $e->getMessage();
    		}
			$conn = null;

		//}
		
	}
	
	//echo "Trame $i: $data_tab[$i]<br />";
}


//$trame = $data_tab[1];

//Décode les trames
/*list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");*/
?>