<?php 
include './top.php';
require ("../fonction/fonctionnalite.php")

//indou

 ?>
 <link rel=stylesheet type=text/css href="../visuel/style2.css"></head>
<body /visuel/Images/background.jpg>

	<div class="titre_PageFonc">
		Nouvelle fonctionnalité
	</div>

	<form id=formulaire method="post" action="../ajout_fonction.php" enctype="multipart/form-data">
		
		<fieldset class="fieldAjoutFonc"> <legend></legend> <br>

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
	</form>
</body>
<div>
				<input class="ajouter_fonc" type="submit" value="Ajouter" />
			</div>

<?php include '../visuel/bottom_ajout_fonction.php'; ?>
