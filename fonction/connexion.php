<?php
require ('fonctionnalite.php');
//définition des variables permettant de se connecter au serveur
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";
//récupération de idPièce à partir de l'URL
    $Identifiant = $_POST['Identifiant'];
    $Mdp = md5($_POST['Mdp']);
    //$idUtilisateur = recupIdUtilisateurFromPiece($idPiece);
//on tente de se connecter à la base de données
    
//Execution de la requette vers la base de données
    
    if(!empty($Identifiant) && !empty($Mdp))
    {
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt= $conn->prepare("SELECT * FROM Utilsateur WHERE Mail='$Identifiant'");  //Sécurité
            $stmt->execute();
            while ($data = $stmt->fetch())
            {


                if($Identifiant == $data['Mail'])
                {
                    if($Mdp == $data['Mdp'])
                    {
                        $MotDePasse = $data['Mdp']; 

                session_start();
                $_SESSION['id'] = $data['idUtilsateur'];
                $_SESSION['pseudo'] = $data['Nom'];
                        
                header("Location: ../visuel/ma_maison.php?idUser=".$_SESSION['id']);
                        exit;
                    }
                }
                
            }
                if(strcmp($Identifiant, $data['Mail']) == 0 ) //comparer les caractère
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
