<?php
session_start();
if(isset($_POST['submit'])) {

	include_once 'dbaccess.php';

	$user_id = $_SESSION['user_id'];
	$account_name = mysqli_real_escape_string($conn, $_POST['bank_account_name']);
	$account_number = $_POST['account_number'];
	$routing_number = $_POST['routing_number'];

	$existing_account = "SELECT * FROM Payment WHERE customer_id = '$user_id' AND bank_id IS NOT NULL";
	$existing_result = mysqli_query($conn, $existing_account);
	$num_results = mysqli_num_rows($existing_result);
	if($num_results <= 0) {

		if(empty($account_name) || empty($account_number) || empty($routing_number)) {
			header("Location: ../empty.php");
			exit();
		} else {

			if($account_number < 0 || $routing_number < 0) {
				header("Location: ../error.php");
				exit();
			} else {
				$insert_bank = "INSERT INTO Bank(account_num, routing_num) VALUES ($account_number, $routing_number)";
				mysqli_query($conn, $insert_bank);
				$bank_id_query = "SELECT bank_id FROM Bank WHERE account_num = $account_number";
				$bank_id = mysqli_query($conn, $bank_id_query);
                $row = mysqli_fetch_assoc($bank_id);
				$tempBank = $row['bank_id'];
				$insert_account = "INSERT INTO Payment(account_name, customer_id, bank_id) VALUES ('$account_name','$user_id',$tempBank)";
				mysqli_query($conn, $insert_account);
				$account_id_query = "SELECT account_id FROM Payment WHERE bank_id = $tempBank";
				$account_id = mysqli_query($conn, $account_id_query);
				$accountRows = mysqli_fetch_assoc($account_id);
                $tempAccountID= $accountRows['account_id'];
				$account_id_update = "UPDATE Bank SET account_id = $tempAccountID WHERE bank_id = $tempBank";
				mysqli_query($conn, $account_id_update);
				$restore = "SELECT account_name, account_num, routing_num FROM Bank b inner join Payment p ON b.account_id = p.account_id WHERE p.customer_id = '$user_id'";
				$restore_result = mysqli_query($conn, $restore);
				$row = mysqli_fetch_assoc($restore_result);
				$_SESSION['bank_account_name'] = $row['account_name'];
				$_SESSION['bank_account_num'] = $row['account_num'];
				$_SESSION['bank_routing_num'] = $row['routing_num'];
				header("Location: ../card_bankUpdate.php");
				exit();
			}
		}

	} else {
		$account_info_query = "SELECT p.account_id, account_name, account_num, routing_num FROM Bank b inner join Payment p ON b.account_id = p.account_id WHERE p.customer_id = '$user_id'";
		$account_info = mysqli_query($conn, $account_info_query);
		$row = mysqli_fetch_assoc($account_info);
		if(empty($account_name)) { $account_name = $row['account_name']; }
		if(empty($account_number)) { $account_number = $row['account_num']; }
		if(empty($routing_number)) { $routing_number = $row['routing_num']; }
		$user_account_id = $row['account_id'];

		$update_bank = "UPDATE Bank SET account_num = $account_number, routing_num = $routing_number WHERE account_id = $user_account_id";
		mysqli_query($conn, $update_bank);
		$update_payment = "UPDATE Payment SET account_name = '$account_name' WHERE account_id = $user_account_id";
		mysqli_query($conn, $update_payment);
		$restore = "SELECT account_name, account_num, routing_num FROM Bank b inner join Payment p ON b.account_id = p.account_id WHERE p.customer_id = '$user_id'";
		$restore_result = mysqli_query($conn, $restore);
		$row = mysqli_fetch_assoc($restore_result);
		$_SESSION['bank_account_name'] = $row['account_name'];
		$_SESSION['bank_account_num'] = $row['account_num'];
		$_SESSION['bank_routing_num'] = $row['routing_num'];
		header("Location: ../card_bankUpdate.php");
		exit();
	}

} else {
	header("Location: ../card_bankUpdate.php");
	exit();
}
