<?php
	session_start();
?>
<head>
		<title>controleur de titre à créer a voir comment...</title>
		<link rel="stylesheet" type ="text/css" media="screen" href="style.css"> 
		<meta charset=UTF-8>
</head>

<header>
		<div id="div_logo">	
			<img id="logo" src="../visuel/images/logo.png">
		</div>

		<div id="div_menu">

<ul class="bouton_menu">
	<li><a href="../visuel/connexion_form.php"> Accueil </a></li>
 	<li><a href="../visuel/ma_maison.php"> Ma Maison </a></li>
 	<li><a href="../visuel/support.php"> Support (FAQ) </a></li>

 	<li><a href="../visuel/connexion_form.php"> 							<?php
							if ($_SESSION['id'] == 0) {
								echo 'Connexion';
							} else {
								print_r($_SESSION['pseudo']);
							}
																
							?>
 </a>
		<ul class="sous_menu">
			<li><a href="#">Mon profil</a></li>
			<li><a href="../visuel/deco.php">Déconnection</a></li>
		</ul>
	</li>
</ul>
				
		</div>
		<div id="barre">
		</div>
</header>
