<?php
require 'bdd.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<link rel="stylesheet" href="minichat.css">
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
<div class="content_index">
	<div class="img_register_login">
		<img src="logo_footer_small.png" alt="lol">
	</div>
	
	
	
	<div class="register_login">
		<a href="register.php"><button class=button_index id="register">REGISTER</button></a>
		<a href="login.php"><button class="button_index" id="login">LOGIN</button></a>
	</div>
</div>
	
</body>
</html>