<?php 
require 'bdd.php';
session_start();

//connection a la bdd :
//recup des 15 dernier messages ( ils ne s'affichent pas encore bonhomme)
//faire un left join , pour lié l'id mentionner dans la table users et le users_id dans la table message pour faire un masta tableau et dire que c'est les meme.
$resultat = $bdd->query('SELECT * FROM messages 
LEFT JOIN users ON users.id=messages.users_id');


while($donnee = $resultat->fetch())
{
	echo '<p>'.htmlspecialchars($donnee['pseudo']).' at '.$donnee['date_creation'].': '.htmlspecialchars($donnee['messages']).'</p>';
}
$resultat->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<meta http-equiv="refresh" content="2">
	<meta charset="UTF-8">
	<title>conversation</title>
</head>
<body>
	
</body>
</html>


