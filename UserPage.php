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
		<div class="container">
			<label for="">Cabinet</label>
			<?php
				
				if($_SESSION['login']!= "admin" && $_SESSION['password']!="admin"){
					$login = $_SESSION['login'];
					$password = $_SESSION['password'];
				}
				else{
					$login = $_POST['login'];
					$password = $_POST['password'];
				}
				
				$connect = mysqli_connect("qwerty.gov","root", "", "login"); 
				if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($connect,$login);
					$password = mysqli_real_escape_string($connect,$password);
					
					if($login!="" && $password!=""){
						$select = "SELECT * FROM users WHERE login ='$login' and password ='$password'";
						$result = mysqli_query($connect, $select);
						$count = mysqli_num_rows($result);
						if( $count == 0){
							header("Location: NoUser.php");
						}
						else{
							$result = mysqli_query($connect, $select);
							$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						}
					}
					else{
						header("Location: login.php");

					}
				}
				mysqli_close($connect);
				?>
			<form class="" action="CheckForUpdate.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="login" value="<?php echo $row["login"]; ?>">
				<input type="password" name="password" value="<?php echo $row["password"]; ?>">
				<?php 
					echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br><br>";
				?>
				<input type="file" class="upload" name="uploadfile">
				<input type="text" name="name" value="<?php echo $row["name"]; ?>">
				<input type="text" name="secondname" value="<?php echo $row["secondname"]; ?>">
				<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
				<button type="submit" class="btn" name="log">Save</button>
			</form>
		</div>
</body>
</html>