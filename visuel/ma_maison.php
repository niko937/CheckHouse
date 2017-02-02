<html>
	
	<?php 

		include("top.php");
		include ("../fonction/connectionfunc.php");
	?>

	<body>	
		
		<div id="global"> 

			<h2>Modifications</h2>

			<form class="ajout_piece" method="post" action="../fonction/traitement.php"> 

				<fieldset> 

				    <legend> Ajout d'une pièce</legend>
						<label> Nom : </label>

			 		<input type="text" name="nom" id="nom" placeholder=" Nom de la pièce">
			 			<br />
					<a href="ma_maison.php">
					<input class="inputMaison" type="submit" value="Enregistrer la pièce" />
						</a>
				</fieldset>

				<!-- <fieldset>
						

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
					
				</fieldset> -->



			</form>	

			<form class ="acces_pieces" method="post" action="accespiece.php">
				<fieldset>
					<legend>Accéder à une pièce</legend>
						
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
		
	</body>
	<?php
	include ("bottom.php");
	?>
</html>

