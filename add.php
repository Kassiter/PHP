<?php
session_start();
	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$secondname = $_POST['secondname'];
	$photo = $_POST['photo'];

	$connect = mysqli_connect("qwerty.gov","root", "", "login"); 
	if(isset($_POST['log'])){
		$login = mysqli_real_escape_string($connect,$login);
		$password = mysqli_real_escape_string($connect,$password);
		$select = "INSERT INTO users (name,secondname,login,password,photo)
				VALUES ('". $name . "','" . $secondname . "','" . $login . "','" . $password . "','" . $photo . "')"; 
		$result = mysqli_query($connect, $select);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
   		echo "error";
	mysqli_close($connect);
?>