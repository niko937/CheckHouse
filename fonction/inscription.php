<?php
ob_start();//tampon
/////////////// Pour se connecter à la Base de donnée ///////////////
$servername = "localhost"; //adresse du serveur
$username = "root"; //identifiant
$password = "root"; //mdp
$dbname = "mydb"; //base à la quel il y accède

	///////DEFINITION DES VARIABLES////////

$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$mail = $_POST['Mail'];
$mdp = md5($_POST['Mdp']);
$adresse = $_POST['Adresse'];
$cdp = $_POST['CodePostal'];
$ville = $_POST['Ville'];
$cle = $_POST['cle'];


///////////////vérification des inputs///////////////
 
if(!empty($nom) && !empty($prenom) && !empty($mdp) && !empty($adresse) && !empty($cdp)  && !empty($mail))
{
	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		///////TEST CLEE produit
	try
	{
		$sql = $conn->query("SELECT `CleProduit` FROM ProduitReference");
		$resultat = $sql->fetch();
		if(strcmp($cle, $resultat['CleProduit']) == 0 ){ //comparer les caractère
      
            echo "Clée produit Valide";

     ////SI TOUT EST BON ON EXECUTE LA REQUETTE
		$sql = ("INSERT INTO Utilsateur (Nom, Prenom, Mail, Mdp, Adresse, CodePostal, Ville)
		VALUES ('$nom','$prenom','$mail','$mdp','$adresse','$cdp', '$ville')");
		$conn->exec($sql);
		header("location: ../visuel/connexion_form.php");
	/// FIN DE SI TOUT EST BON 
                }
                else
                {
                    echo "Clée produit non valide";
                    exit;
                }
	}

		catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
		}

	//----------- Fin test clée produit


	}
	catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }

	

$conn = null;
}
else{}
ob_clean();
ob_end_flush();//fin de tampon

?>

<script>
function validateFormInscription() 
{
    var nom = document.forms["form_inscription"]["Nom"].value;
    var prenom = document.forms["form_inscription"]["Prenom"].value;
    var mdp = document.forms["form_inscription"]["Mdp"].value;
    var mdpconf = document.forms["form_inscription"]["Mdp_confirm"].value;
    var mail = document.forms["form_inscription"]["Mail"].value;
    var adresse = document.forms["form_inscription"]["Adresse"].value;
    var codepostal = document.forms["form_inscription"]["CodePostal"].value;
    var ville = document.forms["form_inscription"]["Ville"].value;
    var cleprod = document.forms["form_inscription"]["cle"].value;
    
    if (nom == "" || prenom =="" || mdp =="" || mdpconf =="" || mail =="" || adresse =="" || codepostal ==""  || ville =="" || cleprod =="") 
    {
        alert("Veuilliez remplir tous les champs");
        return false;
    }
}
</script>

