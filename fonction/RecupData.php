<?php 

	

  function RecupData($idFonctionnalite, $idPiece)
  {
    $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "mydb";
  $rows = array();


  $idFonc = $idFonctionnalite;//RecupData($idFonctionnalite, $idPiece);
    $idPiece = $idPiece;//RecupData($idFonctionnalite, $idPiece);
    $var1='Temperature';
    $var2='Humidite';
    $var3='Luminosite';


if(isset($_GET["idF"]))
        {
          
    try
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE idFonctionnalite ='$idFonc'");
        $stmt->execute();
       
        
          while ($data = $stmt->fetch())
          {
              $NomFonction = $data['NomFonctionnalite'];
              

              if (strcmp($NomFonction, $var1) == 0)	
              {
                $Yunit = $var1;
              }
              else if(strcmp($NomFonction, $var2) == 0)
              {
                $Yunit = $var2;
              }
              else if(strcmp($NomFonction, $var3) == 0)
              { 
                $Yunit = $var3;
              }

          }

              
              //return $Yunit;
              //echo $Yunit;
          
          $stmt->closeCursor();

    }
    catch(PDOException $e)
      {
        //echo $sql . "<br>" . $e->getMessage();
      }
    $conn = null;

}
else
{
  $Yunit = 'Defaut';
}

        //flag is not needed
  $flag = true;
  $table = array();
  $table['cols'] = array(
  //Labels your chart, this represent the column title
  //note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage And string will be used for column title
  array('label' => 'Heure', 'type' => 'number'),
  array('label' => $Yunit, 'type' => 'number')
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
			  list($heure, $minute, $sec) = explode(':', $time);
              list($decimale, $unite, $reste1,$reste2) =sscanf($data['Valeur'],"%1s%1s%1s%1s");
              $Valeur = $decimale.$unite.'.'.$reste1.$reste2;
			  $time = $heure.'.'.$minute;
       

              $temp = array();
        // the following line will used to slice the Pie chart
              $temp[] = array('v' => (float) $time);
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
          //echo $jsonTable;
          $stmt->closeCursor();

    }
    catch(PDOException $e)
      {
        echo $sql . "<br>" . $e->getMessage();
      }
    $conn = null;
  return $jsonTable;
  }
	
  function DisplayUnitY($idFonctionnalite, $idPiece)
  {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";

    $idFonc = $idFonctionnalite;//RecupData($idFonctionnalite, $idPiece);
    $idPiece = $idPiece;//RecupData($idFonctionnalite, $idPiece);
    $var1='Temperature';
    $var2='Humidite';
    $var3='Luminosite';


if(isset($_GET["idF"]))
        {
          
    try
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt= $conn->prepare("SELECT * FROM Fonctionnalite WHERE idFonctionnalite ='$idFonc'");
        $stmt->execute();
       
        
          while ($data = $stmt->fetch())
          {
              $NomFonction = $data['NomFonctionnalite'];
              

              if (strcmp($NomFonction, $var1) == 0)
              {
                $Yunit = $var1;
              }
              else if(strcmp($NomFonction, $var2) == 0)
              {
                $Yunit = $var2;
              }
              else if(strcmp($NomFonction, $var3) == 0)
              { 
                $Yunit = $var3;
              }

          }

              
              return $Yunit;
              //echo $Yunit;
          
          $stmt->closeCursor();

    }
    catch(PDOException $e)
      {
        //echo $sql . "<br>" . $e->getMessage();
      }
    $conn = null;

}
    

    
  }
  

?>
  
