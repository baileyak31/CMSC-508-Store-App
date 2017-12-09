<?php
session_start();
if(isset($_POST['delete'])){

    include_once 'dbaccess.php';
    $userID = $_SESSION['user_id'];
    $sql = "Delete from Customer where customer_id = $userID";
    mysqli_query($conn, $sql);
    session_unset();
    session_destroy();
    header("Location: ../accDeleted.php?$userID");
    exit();

} else{
    header("Location: ../update.php");
    exit();
}
