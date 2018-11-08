<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Login Page</title>
	<link href="https://fonts.googleapis.com/css?family=Righteous|Montserrat:300|Teko" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<script type="text/javascript" src="wow.min.js"></script>
</head>
<body>
	<form class="wow FadeIn" action="process.php" method="POST">
		<div class="container">
			<label > Sign up</label>
			<input type="text" name="login" placeholder="login" value="">
			<input type="password" name="password" placeholder="password" value="">
			<a href="GuestPage.php"> Login as a guest</a>
			<button type="submit" class="btn" name="log">Login</button>
		</div>	
	</form>
</body>
</html>
			