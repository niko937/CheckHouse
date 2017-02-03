<?php include 'top.php';
	require ('../fonction/connexion.php');
?> 

 <header><link rel=stylesheet type=text/css href="/CheckHouse/visuel/style.css"></header>
<body>
<div id="global">

	<div class="titre_PageFonc">
		Bienvenue
	</div>
	
	<form name="MyForm" id="formulaire" method="post" action="../fonction/connexion.php" 
	onsubmit="return validateForm()">
		
		<fieldset class="fieldAjoutFonc"> <legend></legend> <br>

			<label class="labelAjoutFonc">Identifiant</label>  
			<input class="inputAjoutFonc" name="Identifiant" type="text"></input> <br>	

			<label class="labelAjoutFonc">Mot de passe</label>  
			<input class="inputAjoutFonc" name="Mdp" type="password"></input> <br>
			
		</fieldset>
			<div>
				<input class="ajouter_fonc" type="submit" value="Connexion"/>
			</div>

	</form>
	</div>
</body>



<?php include 'bottom.php';	?> 