<?php 
include 'top.php';
include ('../fonction/inscription.php');
 ?>
 
 <header><link rel=stylesheet type=text/css href="/CheckHouse/visuel/style.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
 </header>
<body>

<h1> formulaire d'inscription </h1>
	<form name ="form_inscription" id=formulaire method="post" action="/CheckHouse/fonction/inscription.php" onsubmit="return validateFormInscription()">


		
		<fieldset id="form-profile"> <legend>Information</legend> <br>

			<label for="nom">Nom</label>  
			<input name="Nom" type="text" placeholder="Indiquez votre Nom"/> <br>

			<label for="prenom">Prénom</label>  
			<input name="Prenom" type="text" placeholder="Indiquez votre Prénom"/> <br>

			<label for="password">Mot de passe </label>
			<input type="password" name="Mdp" placeholder="Ex: @zerty-123AbC"/><br>

			<label for="password_confirm">Confirmation</label>
			<input type="password" name="Mdp_confirm" placeholder="Confirmer le mot de passe" /> <br>
 
			<label for="Mail">Mail </label>
			<input type="text" name="Mail" placeholder="Exemple@domaine.fr" /><br>

		

		<legend>Adresse</legend><br>
			<label for="adresse">Adresse </label> <input type="text" name="Adresse" placeholder="Ex: 10 Rue de Vanves">
			<label for="code_postal">Code postal</label><input name="CodePostal" placeholder="Ex: 75000"><br>
			<label for="ville">Ville</label><input name="Ville" placeholder="Ex: issy-les-moulineaux">
	
		<div id="form-clee"> <legend>Clé produit</legend>
		<input id="input-cle" type="text" name="cle" placeholder="Indiquer la clé produit de votre capteur figurant à l'arrière du produit">
		</fieldset>
		
		<p>
		<input id="form-envoie" type="submit" onclick="validateFormInscription()" value="S'inscrire" />
		</p>
	</form>
<?php include 'bottom.php'; ?>
</body>

