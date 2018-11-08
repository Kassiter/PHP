<?php
	session_start();
	$id = $_POST['id'];
	
	$connect = mysqli_connect("qwerty.gov","root", "", "login");
		//if(isset($_POST['log'])){
			$select = "DELETE FROM users WHERE id='$id'";
			$result = mysqli_query($connect, $select);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//}
		
		mysqli_close($connect);
		header("Location: process.php");
?>