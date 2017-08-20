<?php
require 'bdd.php';
session_start();
if (isset($_POST['login'])) {


//je protege mon Post email avec escape_string 
	$pseudo_login = ($_POST['pseudo_login']);
//je check si cet email est dans la base de donnée en fsant une query .
	$resultat=$bdd->query("SELECT * FROM users WHERE pseudo = '$pseudo_login' ");
	$resultat_fetched_login= $resultat->fetch(PDO::FETCH_ASSOC);
//2 choix , si il existe tout va bien je continue si pas erreur.
	if ($resultat_fetched_login) {

		
	//verif mot de passe 
			if ($_POST['mdp_login'] == $resultat_fetched_login['mdp']) {

			
	        	$_SESSION['pseudo'] = $resultat_fetched_login['pseudo'];
	        	$_SESSION['id'] = $resultat_fetched_login['id'];
	        	$_SESSION['logged_in'] = 1;

	       		header("location: minichat.php");
	    	}else {
	        	$_SESSION['message'] = "Mauvais mot de passe ! réesayez !";
	        	header("location: error.php");
    		}
		
	}else{

		$_SESSION['message'] = "cet utilisateur n'existe pas";
   		header("location: error.php");
	}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="post">
pseudo:<input type="text" name="pseudo_login">
mdp:<input type="password" name="mdp_login">
<input type="submit" name="login">
	</form>
</body>
</html>