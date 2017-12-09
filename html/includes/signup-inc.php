<?php

if(isset($_POST['submit'])){

    include_once 'dbaccess.php';

    $firstName = mysqli_real_escape_string($conn, $_POST['first']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    //checking for errors
    //Check for empty fields

    if(empty($firstName) || empty($lastName) || empty($userName) || empty($password) || empty($address)){

        header("Location: ../empty.php");
        exit();

    } else {
        //Check for valid input characters
        if(!preg_match("/^[a-zA-Z]*$/",$firstName) || !preg_match("/^[a-zA-Z]*$/",$lastName)){
            header("Location: ../invalidString.php");
            exit();
        } else {
            $sql = "SELECT * FROM Customer WHERE customer_username = '$userName'";
            $result = mysqli_query($conn, $sql);
            $resultChecker = mysqli_num_rows($result);
            if($resultChecker > 0){
                header("Location: ../takenUsername.php");
                exit();
            }
            else{
                //Hashing users passwords
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                //Insert user into database
                $sql = "INSERT INTO Customer (first_name, last_name, customer_username, customer_password, customer_address) VALUES ('$firstName', '$lastName', '$userName', '$hashedPass', '$address');";
                mysqli_query($conn, $sql);
                header("Location: ../success.php");
                exit();
            }
        }
    }
    





} else{
    header("Location: ../signup.php");
    exit();
}
