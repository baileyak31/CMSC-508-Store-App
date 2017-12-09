<?php
include_once 'header.php';
include_once 'includes/dbaccess.php';
?>

<section class="signup-form">
	<div class="signup-form">
		<?php
			if(isset($_SESSION['user_id'])) {
				$userID = $_SESSION['user_id'];
				$sql = "SELECT account_name, account_num, routing_num from Payment p inner join Bank b on p.bank_id = b.bank_id where p.customer_id = '$userID' AND b.bank_id IS NOT NULL";
				$sql_card = "SELECT account_name, card_num, expiration_date, cvv from Payment p inner join Card c on p.card_id = c.card_id where p.customer_id = '$userID' AND c.card_id IS NOT NULL";
				$result = mysqli_query($conn, $sql);
				$card_result = mysqli_query($conn, $sql_card);
				$all_rows = mysqli_fetch_assoc($result);
				$all_card_rows = mysqli_fetch_assoc($card_result);
				$bank_account_name = mysqli_real_escape_string($conn, $all_rows['account_name']);
				$card_account_name = mysqli_real_escape_string($conn, $all_card_rows['account_name']);
				$account_number = $all_rows['account_num'];
				$routing_number = $all_rows['routing_num'];
				$card_number = $all_card_rows['card_num'];
				$exp_date = $all_card_rows['expiration_date'];
				$cvv = $all_card_rows['cvv'];

				echo "<form class = 'signup-form' action='includes/update-bank.php' method='POST'>
					<input type='text' name='bank_account_name' placeholder='Account Name: $bank_account_name'>
					<input type='number' name='account_number' placeholder='Account Number: $account_number'>
					<input type='number' name='routing_number' placeholder='Routing Number: $routing_number'>
					<button type='submit' name = 'submit'>Update Bank Account</button>
				</form>";

				echo "<form class = 'signup-form' action='includes/update-card.php' method='POST'>
					<input type='text' name='card_account_name' placeholder='Account Name: $card_account_name'>
					<input type='text' name='card_number' placeholder='Card Number: $card_number'>
					<input type='number' name='exp_date' placeholder='Expiration Date as Numbers: $exp_date'>
					<input type='number' name='cvv' placeholder='CVV: $cvv'>
					<button type='submit' name = 'submit'>Update Credit Card</button>
				</form>";


			}
		?>
	</div>
</section>

<?php
include_once 'footer.php';
?>
