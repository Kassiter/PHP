<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Guest Page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous|Montserrat:300|Teko" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<script type="text/javascript" src="wow.min.js"></script>
</head>
<body>
		<div class="container">
			<label for=""> Table</label>
			<?php
				$connect = mysqli_connect("qwerty.gov","root", "", "login"); 
				$select = "SELECT * FROM users";
				$result = mysqli_query($connect, $select);
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo "<a id='guest'><br>
						login: $row[login]";
						echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
						Name: $row[name] <br>
						SecondName: $row[secondname]<br></a>";
				}
				mysqli_close($connect);
			?>
			<form class="" action="login.php">
				<button type="submit" class="btn" name="log">Login</button>
			</form>
		</div>	
</body>
</html>
