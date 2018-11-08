<?php
	session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous|Montserrat:300|Teko" rel="stylesheet">
</head>
<body>

<div class="table">
<label for=""> User info</label>
	<?php
		$login = $_SESSION['login'];
		$password = $_SESSION['password'];
		$id = $_POST['id'];
		$connect = mysqli_connect("qwerty.gov","root", "", "login");
		if(isset($_POST['log'])){
			$login = mysqli_real_escape_string($connect,$login);
			$password = mysqli_real_escape_string($connect,$password);
			$select = "SELECT * FROM users WHERE id='$id'";
			$result = mysqli_query($connect, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo "<br>
				login: $row[login]";
				echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
				Name: $row[name] <br>
				SecondName: $row[secondname]<br>";
			if($login=="admin" && $password=="admin"){
				$log = $row['login'];
				$pass = $row['password'];
				echo "<br>
				<form class='' action='UserPage.php' method='POST'>
					<input type='hidden' name='login' value='$log'>
					<input type='hidden' name='password' value='$pass'>
					<button type='submit' class='info_btn' name='log'>Change</button>
				</form>";
			}
		}
		?>
	<form class="" action="process.php" method="POST">
			<input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?>">
			<input type="hidden" name="password" value="<?php echo $_SESSION['password']; ?>">
			<button type="submit" class="btn" name="log">Back</button>	
	</form>
</div>
</body>
</html>