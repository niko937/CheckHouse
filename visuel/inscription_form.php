<?php 
include 'top.php';
 ?>
 
 <header><link rel=stylesheet type=text/css href="/CheckHouse/visuel/style.css"></header>
<body>

<h1> formulaire d'inscription </h1>
	<form id=formulaire method="post" action="/CheckHouse/fonction/inscription.php" enctype="multipart/form-data">


		
		<fieldset id="form-profile"> <legend>Information</legend> <br>

			<label for="nom">Nom</label>  
			<input name="Nom" type="text"/> <br>

			<label for="prenom">Prénom</label>  
			<input name="Prenom" type="text"/> <br>

			<label for="password">Mot de passe </label>
			<input type="password" name="Mdp"/><br>

			<label for="password_confirm">Confirmation</label>
			<input type="password" name="Mdp_confirm" placeholder="Confirmer le mot de passe" /> <br>
 
			<label for="Mail">Mail </label>
			<input type="text" name="Mail" placeholder="Exemple@domaine.com" /><br>

		

		<legend>Adresse</legend><br>
			<label for="adresse">Adresse </label> <input type="text" name="Adresse">
			<label for="code_postal">Code postal</label><input name="CodePostal"><br>
			<label for="ville">Ville</label><input name="ville">
	
		<div id="form-clee"> <legend>Clé produit</legend>
		<input id="input-cle" type="text" name="cle" placeholder="Indiquer la clé produit">
		</fieldset>
		
		<p>
		<input id="form-envoie" type="submit" value="S'inscrire" />
		</p>
	</form>
<?php include 'bottom.php'; ?>
</body>

