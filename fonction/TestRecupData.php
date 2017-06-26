<?php 

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
	$idFonctionnalite = 1;

  $rows = array();
        //flag is not needed
  $flag = true;
  $table = array();
  $table['cols'] = array(
  //Labels your chart, this represent the column title
  //note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage And string will be used for column title
  array('label' => 'Heure', 'type' => 'number'),
  array('label' => 'Temperature', 'type' => 'number')
        );
  $rows = array();
  $nbrVal = 23;

	try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   	 		$stmt= $conn->prepare("SELECT * FROM donnee WHERE CapteurActionneur_Fonctionnalite_idFonctionnalite ='$idFonctionnalite'");
        $stmt->execute();
       
        
        	while ($data = $stmt->fetch())
        	{
            
              $datetime = $data['DateHeure'];
              list($date, $time) = explode(' ', $datetime); 
              list($decimale, $unite, $reste) =sscanf($data['Valeur'],"%1s%1s%1s");
              $Valeur = $decimale.$unite.'.'.$reste;
            


              $temp = array();
        // the following line will used to slice the Pie chart
              $temp[] = array('v' => (int) $time);
        //Values of the each slice : C = new line, V = value
              $temp[] = array('v' => (float) $Valeur);
              $rows[] = array('c' => $temp);

            
            
            
       
            	/*$datetime = $data['DateHeure'];
            	
            	list($date, $time) = explode(' ', $datetime); 
            	list($decimale, $unite, $reste) = str_split($data['Valeur']);
            	$Valeur = $decimale.$unite.'.'.$reste;

            	echo $date;
            	echo ' ';
            	echo $time;
            	echo ' ';
            	echo $Valeur; 
            	echo '<br>';

            	$Data_tab = array($time, $Valeur);
            	//print_r($Data_tab); 
            	//echo ' ';
            	$Tab_convert = json_encode($Data_tab);
            	echo $Tab_convert;
            	echo '<br>';*/

        	}
          $table['rows'] = $rows;
          $jsonTable = json_encode($table);
          echo $jsonTable;
        	$stmt->closeCursor();

		}
		catch(PDOException $e)
    	{
    		echo $sql . "<br>" . $e->getMessage();
    	}
		$conn = null;
	
?>
<html>
  
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
    //data.addRows(tableau);
      // Set chart options
      var options = {
        curveType: 'function',
        colors:['#900C3F'],
        vAxis: {title: 'Celsius',titlePosition:'top', titleColor:'grey', gridlines:{color: 'grey'}, textStyle:{color:'grey'}, gridlines: {count:6}},
        hAxis: {title: 'Heures', titleColor:'grey', titlePosition:'top',textStyle:{color:'grey'}, gridlines: {count:12, color:'white'}},
        'width':1000,
        'height':600,
        chartArea:{width:'70%'},
        legend: 'none',

      };
 
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
  
 
  <body>
<!--Div that will hold the pie chart-->
<!--style="width:1000; height:600"-->
    <div id="chart_div" style="width:1000; height:600"></div>
  </body>
</html>