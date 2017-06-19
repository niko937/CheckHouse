<?php 
include 'top.php';
require ('../fonction/connexion.php');
?> 

<body>
<div id="global">

	<div class="titre_PageFonc">
		Veuilliez renseigner vos identifiants
	</div>
	
	<div id="MyForm">
	<form name="formulaire_co" id="formulaire" method="post" action="../fonction/connexion.php" onsubmit= "return validateForm()">
		
		<fieldset id="form_connect">  <br>

			 
			<input  name="Identifiant" type="text" placeholder="E-mail"></input> <br/> <br/>	

			<input  name="Mdp" type="password" placeholder="Mot de passe"></input> <br>
			
		</fieldset><br/>
			<div>
				<input id="form_co_envoie" type="submit" value="Connexion"/>

				<input id="form_co_envoie" type="button" value="Inscription" onClick="javascript:document.location.href='inscription_form.php'"/>

			</div>

	</form>
	</div>
	</div>


</body>

<?php include 'bottom.php';	?> 