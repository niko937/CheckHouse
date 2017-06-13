<?php 
include './top.php';
require ("../fonction/fonctionnalite.php")
 ?>

<body>
<div id="global">

	<div class="titre_PageFonc">
		Nouvelle fonctionnalité
	</div>

	<form id=formulaire method="post" action="../fonction/ajout_fonction.php?id=<?php $idPiece=recupIdPieceFromMaison(); echo $idPiece;?>" enctype="multipart/form-data" href="parametre.php">
		
		<fieldset> <legend></legend> <br>

			<label class="labelAjoutFonc">Fonctionnalite</label>  
			<select name="Fonctionnalite" type="text">
				<option value="Temperature">Temperature</option>
				<option value="Humidite">Humidite</option>
				<option value="Luminosite">Luminosite</option>
				<option value="Volet">Volet</option>
			</select><br><br><br>

			<label class="labelAjoutFonc">Cle Produit</label>  
			<input class="inputAjoutFonc" name="CleProduit" type="integer"></input> <br>
			
		</fieldset>
		<div>
				<input class="ajouter_fonc" type="submit" value="Ajouter"/>
			</div>
	</form>
	</div>
</body>


<?php include '../visuel/bottom.php'; ?>
