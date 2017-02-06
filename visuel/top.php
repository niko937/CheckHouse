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
			<table >
				<tr>
					<td class="bouton_menu" type=button>
						<a href="../visuel/index.php"> Accueil </a>
					</td>

					<td class="bouton_menu" type=button> 
						<a href="../visuel/ma_maison.php"> Ma Maison </a>
					</td>

					<td class="bouton_menu" type=button>
						<a href="../visuel/support.php"> Support (FAQ) </a>
					</td>

					<td class="bouton_menu" type=button>
						<a href="../visuel/connexion_form.php"> 
							

							<?php
							if ($_SESSION['id'] == 0) {
								echo 'Connexion';
							} else {
								print_r($_SESSION['pseudo']);
							}
																
							?>
							

								
						</a>
					</td>

				</tr>
			</table>
		</div>
		<div id="barre">
		</div>
</header>
