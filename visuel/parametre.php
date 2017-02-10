<?php
include ($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/visuel/top.php");
require ($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/fonction/fonctionnalite.php"); 
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
	 				<a href="/CheckHouse/visuel/FormAjoutFonction.php?id=<?php $idPiece=recupIdPieceFromMaison(); echo $idPiece;?>"> + ajouter une fonction </a>


	 			</div>
	 		</div>

	 		<?php 
		require('../fonction/RecupData.php');
		$idFonc = recupIdFonc();
		$idPiece = recupIdPieceFromMaison();

		$jsonTable = RecupData($idFonc, $idPiece);
		$unite = DisplayUnitY($idFonc, $idPiece);
	
?>

  
  <script type="text/javascript">
//var tableau = <?php echo $jsonTable; ?>;

 
</script>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
 
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      //google.charts.load('current', {'packages':['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
 
      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
 
      // Create the data table.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var unit1 = '<?php echo $unite; ?>';	
      //var unit2 = '<?php echo $unite; ?>';	
      
    //data.addRows(tableau);
      // Set chart options
      var options = {
        curveType: 'function',
        colors:['#900C3F'],
        vAxis: {title: unit1, titlePosition:'top', titleColor:'grey', gridlines:{color: 'grey'}, textStyle:{color:'grey'}, gridlines: {count:6}},
        hAxis: {title: 'Heures', titleColor:'grey', titlePosition:'top',textStyle:{color:'grey'}, gridlines: {count:12, color:'transparent'}},
        
        backgroundColor:'transparent',
        chartArea:{width:'70%'},
        legend: 'none',

      };
 
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('graph'));
      chart.draw(data, options);
    }
    </script>
<!--Div that will hold the pie chart-->
<!--style="width:1000; height:600"-->

		 			<div id="graph"> </div>
 

	 </div>	 	
	</body>
	 <?php 
	 include ($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/visuel/bottom.php");
	 ?>
</html>