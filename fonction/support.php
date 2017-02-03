<html>	
	<head>

		<title>Support</title>
		<meta>
		<link rel="stylesheet" type ="text/css"
		media="screen" href="style.css"
		</meta>
	</head>

	<?php 
	include("top.php");
	?>
	</br></br></br></br></br></br></br>
	<body>
		<form class="mail" align="center" method="post" action="../fonction/mail.php"> 
				<fieldset> 
					<label class="labelMaison"> Votre adresse mail </label>
			 		<input type="text" name="mail" id="mail" placeholder="exemple@mail.com"><br /><br />
						<br /><br />
			    	<legend class="lgd">Envoyer un ticket (Décrivez votre problème aussi précisément que possible)</legend>
			 		<TEXTAREA name="ticket" rows=8 cols=100></TEXTAREA><br /><br />
						<br /><br />
					<as href="support.php">
					<input type="submit" value="Envoyer le ticket" />
					</a>
				</fieldset>
	</body>


</html>