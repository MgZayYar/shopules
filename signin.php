<?php
	require "dbconnect.php";
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users 
			WHERE email = :email 
			AND password = :password";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":email",$email);
	$stmt->bindParam(":password",$password);
	$stmt->execute();

	if($stmt -> rowCount()){

		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		$_SESSION['loginuser'] = $user;//user is insert into session

		$roleid = $user["role_id"];
		// var_dump($roleid);
		if($roleid == 2){
			// Customer Role
			header("location:index.php");
		}else{
			//Admin and Manager Role
			header("location:categorylist.php");
		}
	}
	else{
		header("location:login.php");
	}
?>