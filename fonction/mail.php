<html>	
	<head>

		<title>Support</title>
		<meta>
		<link rel="stylesheet" type ="text/css"
		media="screen" href="style.css"
		</meta>
	</head>
	<body>
		<?php  
			if (empty($_POST['mail'])) {
			echo "Veuillez indiquer une adresse mail valide";
			}
			$mail=$_POST['mail'];
			$headers = 'Mime-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
			$headers .= "\r\n";
			$ticket = $_POST['ticket'];
			$destinataire = 'domisepg2e@gmail.com';	
			$subject = "Demande de support";
			$expediteur = "From :";
			$expediteur.= $mail;
     		mail($destinataire, $subject, $ticket, $expediteur); 
		?>
		
	</body>


</html>