<?php
require ('fonctionnalite.php');
//définition des variables permettant de se connecter au serveur
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
//récupération de idPièce à partir de l'URL
	$identifiant = $_POST['Identifiant'];
	$Mdp = $_POST['Mdp'];
	//$idUtilisateur = recupIdUtilisateurFromPiece($idPiece);



//on tente de se connecter à la base de données
	
//Execution de la requette vers la base de données
	
	if(!empty($identifiant) && !empty($Mdp))
	{
		try
		{
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    		// set the PDO error mode to exception
   	 		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt= $conn->prepare("SELECT * FROM Utilsateur WHERE Mail='$identifiant'");  //Sécurité
            $stmt->execute();
            while ($data = $stmt->fetch())
            {
                $idUtilisateur = $data['idUtilsateur'];

                if($identifiant == $data['Mail'])
                {
                    if($Mdp == $data['Mdp'])
                    {
                        $identifiantExist = $data['Mail'];              
                        $MotDePasse = $data['Mdp']; 
                        header("Location: ../visuel/ma_maison.php?idUser=".$idUtilisateur);
                        session_start();
                        $_SESSION['Identifiant'] = $identifiant;
                        $_SESSION['Mdp'] = $Mdp;

                        exit;
                    }
                }
                
            }
                if(strcmp($identifiant, $data['Mail']) == 0 )
                {
                     echo "ez";
                }
                else
                {
                    echo "Identifiant ou mot de passe incorrect";
                }

                    $stmt->closeCursor();       
		}
		catch(PDOException $e)
    	{
    		echo $sql . "<br>" . $e->getMessage();
    	}
		$conn = null;
	}

?>

<script>

function validateForm() 
{
    var identifiant = document.forms["formulaire_co"]["Identifiant"].value;
    var Mdp = document.forms["formulaire_co"]["Mdp"].value;
    
    if (identifiant == "" || Mdp =="") 
    {
        alert("Veuilliez remplir tous les champs");
        return false;
    }
}

</script>


