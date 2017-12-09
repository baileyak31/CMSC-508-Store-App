<?php
include_once "dbaccess.php";
session_start();
if(isset($_POST['submit'])){

	$userID = $_SESSION['user_id'];
	$sql = "Select customer_password from Customer where customer_id = '$userID'";
	$duh = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($duh);

	$oldPassword = mysqli_real_escape_string($conn, $_POST['current']);
	$hashedOldPassword = password_verify($oldPassword, $result['customer_password']);
	$newPassword = mysqli_real_escape_string($conn, $_POST['newpass']);
	$hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

	if(!empty($oldPassword) && !empty($newPassword)) {

		if($hashedOldPassword) {

			$sql_update = "Update Customer set customer_password = '$hashedNewPassword' where customer_id = '$userID'";
			mysqli_query($conn, $sql_update);
			header("Location: ../success.php");
			exit();

		} else {
			header("Location: ../incorrectPass.php");
			exit();
		}


	} else {

		header("Location: ../empty.php");
		exit();

	}

}
