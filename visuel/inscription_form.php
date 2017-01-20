<?php 
include 'top.php';

 ?>
 <header><link rel=stylesheet type=text/css href="/visuel/style.css"></header>
<body /visuel/Images/background.jpg>
<h1> Inscription </h1>
	<form id=formulaire method="post" action="/fonction/inscription.php" enctype="multipart/form-data">


		
		<fieldset id="form-profile"> <legend>Profil</legend> <br>

			<label for="nom">Nom</label>  
			<input name="Nom" type="text"/> <br>

			<label for="prenom">Prénom</label>  
			<input name="Prenom" type="text"/> <br>

			<label for="password">Mot de passe </label>
			<input type="password" name="Mdp"/><br>

			<label for="password_confirm">Confirmation</label>
			<input type="password" name="Mdp_confirm" placeholder="Confirmer le mot de passe" /> <br>
 
			<label for="Mail">Adresse Mail </label>
			<input type="text" name="Mail" placeholder="Exemple@domaine.com" /><br>

		</fieldset>

		<fieldset id="form-adresse"> <legend>Adresse</legend><br>
			<label for="num">addresse </label> <input type="text" name="Rue">
			<label id="num">numéro</label><input type="text" name="Numero"><br>
			<label for="code_postal">Code postal</label><input name="CodePostal"><br>
			<label for="ville">Ville</label><input name="ville">
		</fieldset>
		<fieldset id="form-clee"><legend>Clé produit</legend>
		<input id="input-cle" type="text" name="cle" placeholder="indiquer la clée produit">
		</fieldset>
		
		<p>
		<input id="form-envoie" type="submit" value="S'inscrire" />
		</p>
	</form>
</body>
<?php include 'bottom.php'; ?>
