<?php 
	require 'dbconnect.php';
	$name=$_POST['name'];
	$category=$_POST['category'];
	$sql="INSERT INTO subcategories (name, category_id) VALUES (:name, :category)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':category',$category);
	$stmt->execute();
	
		header("location: subcategorylist.php");
	
 ?>