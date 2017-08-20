<?php 
try
{
	
	$bdd = new PDO('mysql:host=localhost;dbname=becode_minichat;charset=utf8', 'root', 'root');
}	
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());

}

?>