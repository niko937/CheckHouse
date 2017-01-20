

<html>
<head>
	<link rel=stylesheet type=text/css href="../visuel/style2.css"></head>
	 <?php include ("../visuel/top.php");?>

     <?php
     	$idPiece=1;
     	$idPieceBis=1;
     	$idPieceTer=3;
     ?>
	 <body>

	 	<?php require ("../fonction/fonctionnalite.php"); ?>
	 	<div class="titre_PageFonc">
	 		<?php 
	 		getNomFonctionnalite($idPiece); 
	 		getNomPiece($idPiece);

	 		?>
	 	</div>

	 	<div class="consigne">
	 		Consignes
	 	</div>

	 	
	 	<div class="titre_liste">
	 		Autres fonctionnalitées
	 		<ul style="list-style-type:square;">
	 			<li>
	 				<a href="index.php"> <?php getNomFonctionnalite($idPieceBis); ?> </a>
	 			</li>
	 			<li>
	 				<a href="index.php"> <?php getNomFonctionnalite($idPieceTer); ?> </a>
	 			</li>
	 			<li>
	 				<a href="index.php">fonction3 </a>
	 			</li>
	 			<li>
	 				<a href="index.php">fonction4 </a>
	 			</li>
	 		</ul>
	 	</div>
	 	<div class="ajout_fonction">
	 		<a href="FormAjoutFonction.php"> + ajouter une fonction </a>
	 	</div>

	 	
	</body>
	 <?php include ("../visuel/bottom.php"); ?>
</html>