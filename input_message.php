<?php
require 'bdd.php';
session_start();
if (isset($_POST['envoyer'])) {

	$message= filter_var($_POST['message'], FILTER_SANITIZE_STRING);


	// Insertion du message à l'aide d'une requête préparée	 
$req = $bdd->prepare('INSERT INTO messages(messages, users_id, date_creation) VALUES(?, ?, CURDATE())');
$req->execute(array($message, $_SESSION['id']));
$req->closeCursor();

	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<!-- action "" car sinon c'est la merde et il me redirige constament sur une double page.-->
<form action="" method="post">
			
		<p>
			
			<label>Message:</label>
				<input type="text" name="message">

				<input type="submit" name="envoyer">
		</p>
	</form>
	
</body>
</html>