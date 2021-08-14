<?php 
	require "dbconnect.php";

	// $image = $_FILES['image'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// $confirm_password = $_POST['confirm_password'];
	$address = $_POST['address'];
	$role = "2";
	$status="1";
	$profile='null';

	// FILE UPLOAD
	// $source_dir = "image/user/";

	// $file_name = mt_rand(100000,999999);

	// $file_exe_array = explode('.',$image['name']);

	// $file_exe = $file_exe_array[1];

	// $file_path = $source_dir.$file_name.'.'.$file_exe;

	// move_uploaded_file($image['tmp_name'], $file_path);

	$sql = "INSERT INTO users(name,profile,email,password,phone,address,status,role_id) VALUES(:name,:profile,:email,:password,:phone,:address,:status,:role)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':profile',$profile);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':address',$address);	
	$stmt->bindParam(':status',$status);
	$stmt->bindParam(':role',$role);
	// $stmt->bindParam(':status',$status);
	// $stmt->bindParam(':role_id',$role_id);
 	var_dump($stmt);
	$stmt->execute();

		header("location:login.php");
	
?>

