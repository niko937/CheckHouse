

<html>
	 <?php include ("../visuel/top.php");
	 		require ("../fonction/fonctionnalite.php"); 
	 		?>
	 
	 <body>

	 <div id="global">

		 <div class="titre_PageFonc">
		 	<?php 
		 		if(isset($_GET["idF"]))
		 		{
		 			getNomFonctionnaliteTitre();
		 			echo ' ';
		 		}
		 		getNomPiece();
			?>
	 	</div>

		 	<div class="consigne">
		 		Consignes
		 	</div>

			<div class="Liste_fontionnalite">
		 		Autres fonctionnalitées

		 		<ul id="ul_parametre">
		 			
			 			<?php
							$servername = "localhost";
							$username = "root";
							$password = "root";
							$dbname = "mydb";
							$idPiece = recupIdPieceFromMaison(); 

							try 
							{
			    				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    				$stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE Piece_idPiece = '$idPiece' " );
			   		 			$stmt->execute();
			    				while ($data = $stmt->fetch())
			    				{

			    			?>

		    		<li>
			 			<a href="parametre.php?id=<?php echo $idPiece;?>&idF=<?php echo $data['idFonctionnalite'];?>"> 
			 				<?php echo $data['NomFonctionnalite']; ?>	
		 				</a>
		 			</li>
		 					<?php
	    						}
	    				$stmt->closeCursor();
							}
							catch(PDOException $e)
						{
		    				//echo $stmt . "<br>" . $e->getMessage();
						}
						$conn = null;
						?>
		 			
		 		</ul>

		 		<div class="ajout_fonction">	 		
	 				<a href="../visuel/FormAjoutFonction.php?id=<?php $idPiece=recupIdPieceFromMaison(); echo $idPiece;?>"> + ajouter une fonction </a>


	 			</div>
	 		</div>

	 		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Heure', 'Température'],
          ['0h',  20],
          ['1h',  20],
          ['2h',  20],
          ['3h',  20],
          ['4h',  20],
          ['5h',  20],
          ['6h',  20],
          ['7h',  20],
          ['8h',  20],
          ['9h',  20],
          ['10h',  20],
          ['11h',  19.5],
          ['12h',  19],
          ['13h',  18.5],
          ['14h',  18],
          ['15h',  18],
          ['16h',  17.8],
          ['17h',  17.7],
          ['18h',  18.5],
          ['19h',  19.5],
          ['20h',  20],
          ['21h',  20],
          ['22h',  20],
          ['23h',  20],
        ]);

        var options = {
          curveType: 'function',
          colors:['#900C3F'], 
          vAxis: {title: 'Celsius', titleColor:'grey',},
      	  hAxis: {title: 'Heures', titleColor:'grey'},
          backgroundColor:'transparent',
          chartArea:{width:'70%'},
          legend: {textStyle: { color: 'grey',fontSize: 12}},
  							 
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('graph'));

        chart.draw(data, options);
      
      }
    </script>

    <div id="graph">
    </div>
 	
	 		
	 	


	 </div>	 	
	</body>
	 <?php include ("../visuel/bottom.php");
	 ?>
</html>