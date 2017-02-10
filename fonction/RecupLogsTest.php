<?php 
//Récupère les logs pour traitement des données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";
//http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=9999
/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "/localhost/CheckHouse/BaseDonnee/Log1.php");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);*/
$data = "100011301020000000020170711010000100011301020100000020170711020000100011301020200000020170711030000100011301020300000020170711040000100011301020400000020170711050000100011301020500000020170711060000100011301020600000020170711070000100011301020700000020170711080000100011301020800000020170711090000100011301020900000020170711100000100011301021000000020170711110000100011301020000000020170711120000100011301019000000020170711130000100011301018000000020170711140000100011301018000000020170711150000100011301018000000020170711160000100011301019000000020170711170000100011301020000000020170711180000100011301021000000020170711190000100011301021500000020170711200000100011301022000000020170711210000100011301022000000020170711220000100011301021800000020170711230000100021303020000000020170711010000100021303021000000020170711020000100021303023000000020170711040000100021303024000000020170711050000100021303025000000020170711060000100021303023000000020170711070000100021303021000000020170711080000100021303020000000020170711090000100021303019000000020170711100000100021303018000000020170711110000100021303015000000020170711120000100021303016000000020170711130000100021303015000000020170711140000100021303022300000020170711150000100021303024500000020170711160000100021303024600000020170711170000100021303024700000020170711180000100021303024800000020170711190000100021303024900000020170711200000100021303025000000020170711210000100021303025100000020170711220000100021303025200000020170711230000100041405050000000020170711010000100041405050100000020170711020000100041405050200000020170711030000100041405050300000020170711040000100041405050400000020170711050000100041405050500000020170711060000100041405050600000020170711070000100041405050700000020170711080000100041405050800000020170711090000100041405050900000020170711100000100041405051000000020170711110000100041405051100000020170711120000100041405051200000020170711130000100041405051300000020170711140000100041405051400000020170711150000100041405051500000020170711160000100041405051600000020170711170000100041405051700000020170711180000100041405051800000020170711190000100041405051900000020170711200000100041405052000000020170711210000100041405052100000020170711220000100041405052200000020170711230000";
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