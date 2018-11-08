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
			<label for=""> Table</label>
				<?php
				if(isset($_SESSION['login'])&& isset($_SESSION['password'])){
					$login = $_SESSION['login'];
					$password = $_SESSION['password'];
				}
				else{
					$login = $_POST['login'];
					$password = $_POST['password'];
				}

				$connect = mysqli_connect("qwerty.gov","root", "", "login"); 
				//if(isset($_POST['log'])){
					$login = mysqli_real_escape_string($connect,$login);
					$password = mysqli_real_escape_string($connect,$password);
					
					if($login!="" && $password!=""){
						$select = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
						$result1 = mysqli_query($connect, $select);
						$count = mysqli_num_rows($result1);
						$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
						if( $count == 0){
							header("Location: NoUser.php");
						
						}
						else{
							if(!(isset($_SESSION['login'])&& isset($_SESSION['password']))){
								$_SESSION['login'] = $_POST['login'];
								$_SESSION['password'] = $_POST['password'];
							}
							$select = "SELECT * FROM users";
							$result = mysqli_query($connect, $select);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								$idnum = $row['id'];
								echo "<br>
								<form class='' action='User.php' method='POST'>
									<input type='hidden' name='id' value='$idnum'>
									<button type='submit' class='info_btn' name='log'>$row[id]</button>
								</form>";
								
								if($login == "admin" && $password == "admin"){
									echo "<br>
								<form class='' action='DeleteUser.php' method='POST'>
									<input type='hidden' name='id' value='$idnum'>
									<button type='submit' class='info_btn' name='log'>X</button>
								</form>";
								}
								
								echo "<br>
								login: $row[login]";
								echo"<td>" . "<img src='" . $row['photo'] . "' ></img>" . "</td><br>
								Name: $row[name] <br>
								SecondName: $row[secondname]<br>";
								
							}
							if($login == "admin" && $password == "admin"){
							echo "<br><form class='' action='addUser.php' method='POST'>
									<button type='submit' class='btn' name='log'>AddUser</button>
								</form>";
							}
						}
					}
					else{
						header("Location: login.php");
			
					}
				//}
				mysqli_close($connect);
			
				if(!($login == "admin" && $password == "admin")){
					echo "<form class='' action='UserPage.php' method='POST'>
						<button type='submit' class='btn' name='log'>ChangeSettings</button>
					</form>";
				}
				?>
		<a href="Logout.php"> Log out</a>
		</div>	
</body>
</html>