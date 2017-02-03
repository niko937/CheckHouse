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

				    <p>Ajout d'une pièce</p>

			 			<input class="ma_maison_input" type="text" name="nom" placeholder=" Nom de la pièce">
			 			<br />
			 			<input class="ma_maison_input" type="text" name="superficie" placeholder=" superficie"><br/>

					
				</fieldset><br/>
				<input id="envoie_mamaison" type="submit" value="Enregistrer la pièce" />

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
					<h2>Accéder à une pièce</h2>
						
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

