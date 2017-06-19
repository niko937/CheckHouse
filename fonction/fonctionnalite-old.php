<?php

function recupIdUtilisateurFromPiece($idPiece)
{
    global $idUtilisateur;

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt= $conn->prepare("SELECT * FROM Piece WHERE idPiece='$idPiece'");  //Sécurité
        $stmt->execute();
        while ($data = $stmt->fetch())
        {
            $idUtilisateur = $data['Utilsateur_idUtilsateur'];
            //echo $piece;
            //echo $data['Surface'];
            //echo "<br>";
        }
        $stmt->closeCursor();
    }
    catch(PDOException $e)
    {
    }
    $conn = null;

    return $idUtilisateur;
}

function recupIdPieceFromMaison()
{
    global $idPieceFromMaison;
    $idPieceFromMaison = $_GET['id'];

    //echo $idPieceFromMaison;
    return $idPieceFromMaison;
}

function recupIdFonc()
{
    global $idFonction;

    $idFonction = $_GET['idF'];

    return $idFonction;
}

function getNomPiece()
{
	global $piece;
    $idPiece = recupIdPieceFromMaison();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";

	try 
	{
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    	$stmt= $conn->prepare("SELECT * FROM Piece WHERE idPiece='$idPiece'");  //Sécurité
    	$stmt->execute();
    	while ($data = $stmt->fetch())
    	{
    		$piece = $data['NomPiece'];
        	echo $piece;
        	//echo $data['Surface'];
        	//echo "<br>";
   		}
    	$stmt->closeCursor();
	}
	catch(PDOException $e)
	{
	}
	$conn = null;

    return $piece;
}

function getNomFonctionnaliteTitre()
{
    global $fonctionnalite;
    $idPiece = recupIdPieceFromMaison();
    $idFonction = recupIdFonc();
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";

    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt= $conn->prepare("SELECT NomFonctionnalite FROM Fonctionnalite WHERE idFonctionnalite='$idFonction'");
        $stmt->execute();
       
        while ($data = $stmt->fetch())
        {
            $fonctionnalite = $data['NomFonctionnalite'];
            echo $fonctionnalite;
            //echo $data['Surface'];
            //echo "<br>";
        }
        $stmt->closeCursor();
    }
    catch(PDOException $e)
    {

    }
    $conn = null;

    return $fonctionnalite;
}

function Li()
{
    
}


?>
