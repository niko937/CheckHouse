<?php

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
    
        $stmt= $conn->prepare("SELECT * FROM 'Fonctionnalite' WHERE CeMac_Piece_idPiece='$idPiece'");
        $stmt->execute();
        while ($data = $stmt->fetch())
        {
            $piece = $data['NomFonctionnalite'];
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
}

function insertFonction($idPiece)
{
    
}


//getNomPiece();
//echo "tinetok"
?>
