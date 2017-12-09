<?php
session_start();
if(isset($_POST['submit'])){

    include_once 'dbaccess.php';

    $user_id = $_SESSION['user_id'];
    $account_name = mysqli_real_escape_string($conn, $_POST['card_account_name']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $hashed_card_number = password_hash($card_number, PASSWORD_DEFAULT);
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];

    $existing_sql = "SELECT * FROM Payment WHERE customer_id = '$user_id' AND card_id IS NOT NULL";
    $existing_result = mysqli_query($conn, $existing_sql);
    $num_results = mysqli_num_rows($existing_result);

    if($num_results <= 0) {

        if(empty($account_name) || empty($card_number) || empty($exp_date) || empty($cvv)) {
            header("Location: ../empty.php");
            exit();
        } else {

            if($card_number < 0 || $exp_date < 0 || $cvv < 0) {
                header("Location: ../error.php");
                exit();
            } if(!preg_match("/[0-9]$/",$card_number) || strlen($card_number) > 16) {
                header("Location: ../invalidString.php");
                exit();
            } else {
                $insert_card = "INSERT INTO Card(card_num, expiration_date, cvv) VALUES ($card_number, $exp_date, $cvv)";
                mysqli_query($conn, $insert_card);
                $card_id_query = "SELECT card_id FROM Card WHERE card_num = $card_number";
                $card_result = mysqli_query($conn, $card_id_query);
                $card_row = mysqli_fetch_assoc($card_result);
                $temp_card = $card_row['card_id'];
                $insert_account = "INSERT INTO Payment(account_name, customer_id, card_id) VALUES ('$account_name','$user_id',$temp_card)";
                mysqli_query($conn, $insert_account);
                $account_id_query = "SELECT account_id FROM Payment WHERE card_id = $temp_card";
                $account_id = mysqli_query($conn, $account_id_query);
                $account_row = mysqli_fetch_assoc($account_id);
                $temp_account_id = $account_row['account_id'];
                $account_id_update = "UPDATE Card SET account_id = $temp_account_id WHERE card_id = $temp_card";
                mysqli_query($conn, $account_id_update);

                $restore = "SELECT account_name, card_num, expiration_date, cvv FROM Card c inner join Payment p ON c.account_id = p.account_id WHERE p.customer_id = '$user_id'";
                $restore_result = mysqli_query($conn, $restore);
                $row = mysqli_fetch_assoc($restore_result);
                $_SESSION['card_account_name'] = $row['account_name'];
                $_SESSION['card_num'] = $row['card_num'];
                $_SESSION['exp_date'] = $row['expiration_date'];
                $_SESSION['cvv'] = $row['cvv'];
                header("Location: ../card_bankUpdate.php");
                exit();
            }
        }

    } else {
        $account_info_query = "SELECT p.account_id, account_name, card_num, expiration_date, cvv FROM Card c inner join Payment p ON c.account_id = p.account_id WHERE p.customer_id = '$user_id'";
        $account_info = mysqli_query($conn, $account_info_query);
        $row = mysqli_fetch_assoc($account_info);
        if(empty($account_name)) { $account_name = $row['account_name']; }
        if(empty($card_number)) { $card_number = $row['card_num']; }
        if(empty($exp_date)) { $exp_date = $row['expiration_date']; }
        if(empty($cvv)) { $cvv = $row['cvv']; }
        $user_account_id = $row['account_id'];

        $update_card = "UPDATE Card SET card_num = $card_number, expiration_date = $exp_date, cvv = $cvv WHERE account_id = $user_account_id";
        mysqli_query($conn, $update_card);
        $update_payment = "UPDATE Payment SET account_name = '$account_name' WHERE account_id = $user_account_id";
        mysqli_query($conn, $update_payment);
        $restore = "SELECT account_name, card_num, expiration_date, cvv FROM Card c inner join Payment p ON c.account_id = p.account_id WHERE p.customer_id = '$user_id'";
        $restore_result = mysqli_query($conn, $restore);
        $row = mysqli_fetch_assoc($restore_result);
        $_SESSION['card_account_name'] = $row['account_name'];
        $_SESSION['card_num'] = $row['card_num'];
        $_SESSION['exp_date'] = $row['expiration_date'];
        $_SESSION['cvv'] = $row['cvv'];
        header("Location: ../card_bankUpdate.php");
        exit();
    }

} else {
    header("Location: ../card_bankUpdate.php");
    exit();
}
