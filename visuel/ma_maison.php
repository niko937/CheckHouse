<?php 
include("top.php");

if(isset($_SESSION)){
	require($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/fonction/traitement.php");
}
else{
echo "NO";
}
?>

	<body>	
		
		<div id="global"> 

			<h2>Ma maison</h2>


			<form class="ajout_piece" method="post" action="/CheckHouse/fonction/traitement.php"> 

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
					<h3>Accéder à une pièce</h3>
						
						<?php
						if(empty($_SESSION['id'])) {
							
							} else {
							$Id = $_SESSION['id'];
    						$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');
							$reponse = $bdd->query("SELECT * FROM piece WHERE `Utilsateur_idUtilsateur` = $Id");

								while ($donnees = $reponse->fetch())
									{

										?>
										 	<a href= "parametre.php?id=<?php echo $donnees['idPiece'];?>">
										<?php
									 if (!empty($donnees['NomPiece'])){
										echo $donnees['NomPiece'] . '<br />';
								 		} 
							 		else {}
									 }								
									}
						

						?>
				</fieldset>

			</form>
				
		</div>		
	
	</body>
	
<?php include ("bottom.php"); ?>	
