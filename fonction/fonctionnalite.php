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

function getNomFonctionnalite()
{
    global $fonctionnalite;
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
    
        $stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE Piece_idPiece='$idPiece'");
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

function insertFonction($idPiece)
{
    
}


//getNomPiece();
//echo "tinetok"
?>
