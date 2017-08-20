<?php
require 'bdd.php';
session_start();

if (isset($_POST['register']) AND $_POST['mdp'] == $_POST['comfirm']) {
//Session qui vont etre utilisée dans ma page minichat.
	$_SESSION['fullname'] = $_POST['fullname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['pseudo'] = $_POST['pseudo'];

//protection contre toute injections sql avec escape_string .(voir doc) edit : pas en PDO ()

	$fullname = ($_POST['fullname']);
	$pseudo = ($_POST['pseudo']);
	$email = ($_POST['email']);
//check docu hash 
	$mdp =($_POST['mdp']);
//je check si l'email est deja dans ma base de donée 
	

	$resultat= $bdd->query("SELECT * FROM users WHERE email='$email'");
	$resultat_fetched= $resultat->fetch(PDO::FETCH_ASSOC);
		if ( $resultat_fetched) {
		    
		    $_SESSION['message'] = 'cet utilisateur est deja enregistré veuillez vous connectez';
		    
		    header("location: error.php");
		    

		    
		}else{

			$ajout_user='INSERT INTO users(pseudo, mdp, fullname, email, date_registration ) VALUES(?, ?, ?, ?, CURDATE())';

			if ($req = $bdd->prepare($ajout_user)) {
				
				$req->execute(array($_POST['pseudo'], $_POST['mdp'], $_POST['fullname'], $_POST['email']));
				$req->closeCursor();
					header("location:minichat.php");
			}
			

       
		        //$_SESSION['logged_in'] = 1; // utilisateur co =1 deco !=1
		      	//$_SESSION['message'] = "success!";

		      




			
			else {
			        $_SESSION['message'] = 'erreur!';
			        header("location: error.php");
			    }
    
		}








	


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
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