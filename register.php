<?php
require 'bdd.php';
session_start();

if (isset($_POST['register'])) {
//sanitisation en tableau .
	if ($_POST['mdp'] == $_POST['comfirm']) {
		# code...
		
			$fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
			$pseudo = filter_var($_POST['pseudo'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);	
		//check docu hash 
			$mdp = ($_POST['mdp']);
			
			$_SESSION['fullname'] = $fullname;
			$_SESSION['email'] = $email;
			$_SESSION['pseudo'] = $pseudo;


		//protection contre toute injections sql avec escape_string .(voir doc) edit : pas en PDO ()

		//je check si l'email est deja dans ma base de donée 
			

			$resultat= $bdd->query("SELECT * FROM users WHERE email='$email'");
			$resultat_fetched= $resultat->fetch(PDO::FETCH_ASSOC);
				if ( $resultat_fetched) {
				    
				    $_SESSION['message'] = 'cet utilisateur est deja enregistré veuillez vous connectez';
				    
				    header("location: error.php");
				    

				    
				}else{

					$ajout_user='INSERT INTO users(pseudo, mdp, fullname, email, date_registration ) VALUES(?, ?, ?, ?, CURDATE())';

					if ($req = $bdd->prepare($ajout_user)) {
						
						$req->execute(array($pseudo, $_POST['mdp'], $fullname, $email));
						$req->closeCursor();

			
							header("location:minichat.php");
					}else {
					        $_SESSION['message'] = 'erreur!';
					        header("location: error.php");
					    }
		    
				}
					

		       
				        //$_SESSION['logged_in'] = 1; // utilisateur co =1 deco !=1
				      	//$_SESSION['message'] = "success!";

				      




					
					








			


	}else {
	$_SESSION['message']='veuillez rentrer des mots de passe identique';
	header("location: error.php");
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
<form action="" method="post">
	<label >Nom:</label>
		<input type="text" name="fullname">
	<label>Pseudo:</label>
		<input type="text" name="pseudo">
	<label >Password:</label>
		<input type="Password" name="mdp">
	<label >Comfirm Password:</label>
		<input type="Password" name="comfirm">
	<label >Email:</label>
		<input type="email" name="email">

		<input type="submit" name="register">
	

	
</form>
	
</body>
</html>