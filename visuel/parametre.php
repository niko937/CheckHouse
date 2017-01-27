

<html>
<head>
	<link rel=stylesheet type=text/css href="../visuel/style2.css"></head>
	 <?php include ("../visuel/top.php");?>
	 <?php require ("../fonction/fonctionnalite.php"); ?>
	 
	 <body>
	 	<div class="titre_PageFonc">
	 		<?php 
	 		if(isset($_GET["idF"]))
	 		{
	 			getNomFonctionnaliteTitre();
	 			echo ' ';
	 		}
	 		getNomPiece();
	 		?>
	 	</div>

	 	<div class="consigne">
	 		Consignes
	 	</div>

	 	
	 	<div class="titre_liste">
	 		Autres fonctionnalitées
	 		<ul style="list-style-type:square;">
	 			
	 			<?php
				$servername = "localhost";
				$username = "root";
				$password = "root";
				$dbname = "mydb";
				$idPiece = recupIdPieceFromMaison(); 

				try 
				{
    				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    				$stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE Piece_idPiece = '$idPiece' " );
   		 			$stmt->execute();
    				while ($data = $stmt->fetch())
    				{

    			?>
    					<li>
	 						<a href="parametre.php?id=<?php echo $idPiece;?>&idF=<?php echo $data['idFonctionnalite'];?>"> 
	 							<?php echo $data['NomFonctionnalite']; ?>
	 							
	 						</a>
	 					</li>
	 					<?php
    				}
    				$stmt->closeCursor();
				}
				catch(PDOException $e)
				{
    				//echo $stmt . "<br>" . $e->getMessage();
				}
				$conn = null;
				?>
	 			
	 		</ul>
	 	</div>
	 	<div class="ajout_fonction">	 		
	 		<a href="../visuel/FormAjoutFonction.php?id=<?php $idPiece=recupIdPieceFromMaison(); echo $idPiece;?>"> + ajouter une fonction </a>
	 	</div>

	 	
	</body>
	 <?php include ("../visuel/bottom.php");?>
</html>