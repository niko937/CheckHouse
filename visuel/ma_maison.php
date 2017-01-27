<html>
	<head>
		<title>Ma Maison</title>
		<meta >
		<link rel="stylesheet" type ="text/css"
		media="screen" href="style_maison.css"

		</meta>
	</head>
	
	<?php 
		include ("top.php");
	?>
	<body>
		<h1 align="center";><b>Ma Maison</b></h1>		
		
		<div class="modif"><h2>Modifications</h2>
			<form class="ajout_piece" align="center" method="post" action="../fonction/traitement.php"> 
				<fieldset> 
			    	<legend class="lgd">Ajout d'une pièce</legend><br />
					<label> Nom : </label>
			 		<input type="text" name="nom" id="nom" placeholder=" Nom de la pièce"><br /><br />
					
					<a href="ma_maison.php">
					<input type="submit" value="Enregistrer la pièce" />
					</a>
				</fieldset>

				<fieldset>
					<legend class="lgd">Supprimer une pièce</legend>
						
						<?php
    						$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
							$reponse = $bdd->query('SELECT * FROM piece');
							while ($donnees = $reponse->fetch())
							 {
							?>
								<h3>
							 	<a href= "../fonctfion/suppression.php?id=<?php echo $donnees['idPiece'];?>">
							 	<?php
							 		echo $donnees['NomPiece'] . '<br />';
							 	?>
							 	</a>
							 	</h3>
							 	<?php
							 }
								?>
				</fieldset>
			</form>	

		</div>		
		<div class="pieces"><h2>Mes Pièces</h2>
			<form class ="acces_piece" align ="center" method="post">
				<fieldset>
					<legend class="lgd">Accéder à une pièce</legend>
						
						<?php
    						$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
							$reponse = $bdd->query('SELECT * FROM piece');
							while ($donnees = $reponse->fetch())
							 {
							?>
								<h3>
							 	<a href= "parametre.php?id=<?php echo $donnees['idPiece'];?>">
							 	<?php
							 		echo $donnees['NomPiece'] . '<br />';
							 	?>
							 	</a>
							 	</h3>
							 	<?php
							 }
								?>
				</fieldset>

			</form>
		</div>	
		<?php 
			include("bottom.php");	
		?>	
	</body>
</html>

