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
			<label for="">Table</label>
				<?php
				$login = $_POST['login'];
				$password = $_POST['password'];
				$name = $_POST['name'];
				$secondname = $_POST['secondname'];
				$id = $_POST['id'];
				if($_SESSION['login']!="admin" && $_SESSION['password']){
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['password'] = $_POST['password'];
				}
				
				$connect = mysqli_connect("qwerty.gov","root", "", "login"); 
				if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($connect,$login);
					$password = mysqli_real_escape_string($connect,$password);
					
					$uploaddir = './uploads/';
					$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
					move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile);
					$select = "UPDATE users SET photo='./uploads/" . $_FILES['uploadfile']['name'] . "' WHERE id='$id'";
					$result = mysqli_query($connect, $select);	
						
					$select = "UPDATE users SET login='$login' WHERE id='$id'";
					$result = mysqli_query($connect, $select);
					$select = "UPDATE users SET password='$password' WHERE id='$id'";
					$result = mysqli_query($connect, $select);
					$select = "UPDATE users SET name='$name' WHERE id='$id'";
					$result = mysqli_query($connect, $select);
					$select = "UPDATE users SET secondname='$secondname' WHERE id='$id'";
					$result = mysqli_query($connect, $select);
					}
					else{
						header("Location: login.php");
						exit();
					}
				mysqli_close($connect);
				?>
			<form class="" action="process.php" method="POST">
				<input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?>">
				<input type="hidden" name="password" value="<?php echo $_SESSION['password']; ?>">
			</form>
			<script>document.getElementsByTagName('form')[0].submit();</script>
		</div>
</body>
</html>