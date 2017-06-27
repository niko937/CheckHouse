<?php 
$test= $_SERVER["HTTP_REFERER"];

//require ($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/fonction/actionneur.php"); 

//include ($_SERVER["DOCUMENT_ROOT"] . "/CheckHouse/visuel/parametre.php"); 
//session_start();

// Connection à la base de donnée

//$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', 'root');

// Fin connection 

//préparation requette
$a= $_POST['choix'];




//$Id = $_SESSION['id']; // on récupère l'id de la session

//$req = $bdd->prepare("SELECT * FROM piece WHERE `Utilsateur_idUtilsateur` = $Id ");

//$req = $bdd->prepare("SELECT * FROM piece WHERE `Utilsateur_idUtilsateur` = :Utilsateur_idUtilsateur ");
//$req->execute();

//Pour un tableau :
/*$req->execute(array(':Utilsateur_idUtilsateur'=>1));
echo "reponse: ";

while($row = $req->fetch()){
$nom=$row['NomPiece'];
echo $nom;
}
//fin préparatio nrequette


T OOOO R C NN VVVV AAAA XX YYYY MM DD HH mm ss
T=1
0000 = sesion.ID(utilisateur)
R= 1 pour récupérer la donnée d’un capteur, 2 pour envoyer une commande à effecteur
C= type de capteur (get Fonctionnalite_idFonctionnalite) voir liste capteur
NN

*/
//TYPE DE REQUETTE : 1- ecriture ; 2-lecture ; 3- lecture ecriture
//a = requete actioneur

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=A12E&TRAME=1A12E" .$a ."a011121");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//$data = ""
curl_exec($ch);
curl_close($ch);
 header('Location: '.$test);

?>



<?php
//On traite le formulaire
if(isset($_POST['champ'])){
    echo ' variable projet : ' ;
    $tt= $_POST['champ'];
    echo $tt;

}

?>
