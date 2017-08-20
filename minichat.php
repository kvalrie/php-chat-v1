<?php
require 'bdd.php';
session_start();
if (isset($_POST['envoyer'])) {


	// Insertion du message à l'aide d'une requête préparée	 
$req = $bdd->prepare('INSERT INTO messages(messages, users_id, date_creation) VALUES(?, ?, CURDATE())');
$req->execute(array($_POST['message'], $_SESSION['id']));
$req->closeCursor();

	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="UTF-8">
	<title>Minichat</title>
</head>
<body>
	<form action="minichat.php" method="post">
			
		<p>
			
			<label>Message:</label>
				<input type="text" name="message">

				<input type="submit" name="envoyer">
		</p>
	</form>
<?php 
//connection a la bdd :
//recup des 15 dernier messages ( ils ne s'affichent pas encore bonhomme)
$resultat = $bdd->query('SELECT messages, date_creation,users_id FROM messages ORDER BY ID');


while($donnee = $resultat->fetch())
{
	echo '<p>'.htmlspecialchars($donnee['users_id']).' at '.$donnee['date_creation'].': '.htmlspecialchars($donnee['messages']).'</p>';
}
$resultat->closeCursor();

?>

</body>
</html>
