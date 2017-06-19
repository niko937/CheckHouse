<?php
session_start();

if (empty($_SESSION['id'])) {
								$pseudo ='Connexion';
							} else {
								$pseudo =$_SESSION['pseudo'];
							}
?>

<head>
		<title>controleur de titre à créer a voir comment...</title>
		<link rel="stylesheet" type ="text/css" media="screen" href="/CheckHouse/visuel/style.css"> 
		<meta charset=UTF-8>
</head>

<header>
		<div id="div_logo">	
			<img id="logo" src="/CheckHouse/visuel/images/logo.png">
		</div>

		<div id="div_menu">

<ul class="bouton_menu">
 	<li><a href="/CheckHouse/visuel/ma_maison.php"> Ma Maison </a></li>
 	<li><a href="/CheckHouse/visuel/support.php"> Support </a></li>
	<li><a href="/CheckHouse/visuel/nos_produits.php"> Nos produits </a></li>
 	<li><a href="/CheckHouse/visuel/connexion_form.php"><?php
							echo $pseudo;		
?>
 </a>
		<ul class="sous_menu">
			<li><a href="#">Mon profil</a></li>
			<li><a href="/CheckHouse/visuel/deco.php">Déconnection</a></li>
		</ul>
	</li>
</ul>
				
		</div>
		<div id="barre">
		</div>
</header>
