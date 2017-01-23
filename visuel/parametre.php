

<html>
<head>
	<link rel=stylesheet type=text/css href="../visuel/style2.css"></head>
	 <?php include ("../visuel/top.php");?>
	 <?php require ("../fonction/fonctionnalite.php"); ?>
	 
	 <body>
	 	<div class="titre_PageFonc">
	 		<?php 
	 		getNomFonctionnalite(); 
	 		getNomPiece();
	 		?>
	 	</div>

	 	<div class="consigne">
	 		Consignes
	 	</div>

	 	
	 	<div class="titre_liste">
	 		Autres fonctionnalitées
	 		<ul style="list-style-type:square;">
	 			<li>
	 				<a href="index.php"> <?php getNomFonctionnalite(); ?> </a>
	 			</li>
	 			<li>
	 				<a href="index.php"> <?php getNomFonctionnalite(); ?> </a>
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
	 		<a href="../visuel/FormAjoutFonction.php?id=<?php $id=recupIdPieceFromMaison(); echo $id;?>"> + ajouter une fonction </a>
	 	</div>

	 	
	</body>
	 <?php include ("../visuel/bottom.php"); ?>
</html>$