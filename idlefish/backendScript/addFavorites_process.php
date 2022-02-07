<?php
	include 'dbh.php';
	session_start();

	// if user click the submit button
	if (isset($_POST['submitFavorite'])) {
		$product_id = $_POST['product_id'];
		$user_id = $_POST['user_id'];

		
		// insert user to database
		$sql2 = "INSERT INTO favorites (productId, userId) VALUES ('$product_id', '$user_id');";
		mysqli_query($conn, $sql2);
				
		header("Location: ../favorite.php");
		
	}



