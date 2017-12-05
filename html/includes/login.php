<?php

session_start();

if(isset($_POST['submit'])){

    include_once 'dbaccess.php';
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);


    //Check if inputs are empty

    if(empty($user) || empty($pass)){
        header("Location: ../index.php?login=empty");
        exit();
    }else {
        $sql = "SELECT * FROM Customer WHERE customer_username= '$user'";
        $result = mysqli_query($conn, $sql);
        $resultChecker = mysqli_num_rows($result);
        if($resultChecker < 1){
            header("Location: ../index.php?login=error");
            exit();
        }
        else{
            if($row = mysqli_fetch_assoc($result)){
                //dehash the password to compare
                $hashedpasschecker = password_verify($pass, $row['customer_password']);
                if(!$hashedpasschecker){
                    header("Location: ../index.php?login=error");
                    exit();
                }
                elseif($hashedpasschecker){
                    //login user
                    $_SESSION['user_id'] = $row['customer_id'];
                    $testvar = $row['customer_id'];
                    $_SESSION['user_first'] = $row['first_name'];
                    $_SESSION['user_last'] = $row['last_name'];
                    $_SESSION['user_address'] = $row['customer_address'];
                    $_SESSION['user_username'] = $row['customer_username'];
                    header("Location: ../index.php?login=successful");
                    exit();
                }
                else{
                    header("Location: ../index.php?login=error");
                    exit();
                }
            }
        }
    }



}else{
    header("Location: ../index.php?login=error");
    exit();
}