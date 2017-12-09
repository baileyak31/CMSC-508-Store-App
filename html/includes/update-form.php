<?php
session_start();
if(isset($_POST['submit'])){

    include_once 'dbaccess.php';

    $userID = $_SESSION['user_id'];
    $firstName = mysqli_real_escape_string($conn, $_POST['first']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    //Check for empty fields
    if(empty($firstName) && empty($lastName) && empty($userName) && empty($password) && empty($address)){

        header("Location: ../empty.php");
        exit();

    } else {
        //Check for valid input characters
        if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName) && !(empty($firstName)) && !(empty($lastName))) {
            header("Location: ../invalidString.php");
            exit();
        } else {
            //Check if username already exists
            if (!empty($userName)) {
                $sql = "SELECT * FROM Customer WHERE customer_username = '$userName'";
                $result = mysqli_query($conn, $sql);
                $resultChecker = mysqli_num_rows($result);
                if ($resultChecker > 0) {
                    header("Location: ../takenUsername.php");
                    exit();
                }else{
                    //Checking which values are empty and updating
                    if(empty($firstName)) {
                        $firstName = $_SESSION['user_first'];
                    }
                    if(empty($lastName)) {
                        $lastName = $_SESSION['user_last'];
                    }
                    if(empty($userName)) {
                        $userName = $_SESSION['user_username'];
                    }
                    if(empty($address)) {
                        $address = $_SESSION['user_address'];
                    }
                    //UPDATE TABLE
                    $sql = "UPDATE Customer SET first_name = '$firstName', last_name = '$lastName', customer_username = '$userName', customer_address = '$address' WHERE customer_id = '$userID'";
                    mysqli_query($conn, $sql);
                    session_unset();
                    session_destroy();
                    session_start();
                    $reStoreSQL = "SELECT * FROM Customer WHERE customer_id = '$userID'";
                    $result = mysqli_query($conn, $reStoreSQL);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row['customer_id'];
                    $_SESSION['user_first'] = $row['first_name'];
                    $_SESSION['user_last'] = $row['last_name'];
                    $_SESSION['user_address'] = $row['customer_address'];
                    $_SESSION['user_username'] = $row['customer_username'];
                    header("Location: ../update.php");
                    exit();
                }
            } else {
                //Checking which values are empty and updating
                if(empty($firstName)) {
                    $firstName = $_SESSION['user_first'];
                }
                if(empty($lastName)) {
                    $lastName = $_SESSION['user_last'];
                }
                if(empty($userName)) {
                    $userName = $_SESSION['user_username'];
                }
                if(empty($address)) {
                    $address = $_SESSION['user_address'];
                }
                //UPDATE TABLE
                $sql = "UPDATE Customer SET first_name = '$firstName', last_name = '$lastName', customer_username = '$userName', customer_address = '$address' WHERE customer_id = '$userID'";
                mysqli_query($conn, $sql);
                session_unset();
                session_destroy();
                session_start();
                $reStoreSQL = "SELECT * FROM Customer WHERE customer_id = '$userID'";
                $result = mysqli_query($conn, $reStoreSQL);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['customer_id'];
                $_SESSION['user_first'] = $row['first_name'];
                $_SESSION['user_last'] = $row['last_name'];
                $_SESSION['user_address'] = $row['customer_address'];
                $_SESSION['user_username'] = $row['customer_username'];
                header("Location: ../update.php");
                exit();
            }
        }
    }
} else{
    header("Location: ../update.php");
    exit();
}
