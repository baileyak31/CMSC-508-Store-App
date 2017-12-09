<?php
session_start();

if(isset($_POST['prod_name']) && isset($_POST['prod_price']) && isset($_POST['vendor_id'])) {
    array_push($_SESSION['cart_prod_id'],$_POST['prod_id']);
    array_push($_SESSION['cart_prod_name'],$_POST['prod_name']);
    array_push($_SESSION['cart_prod_price'], $_POST['prod_price']);
    array_push($_SESSION['cart_vendor_name'],$_POST['vendor_name']);
    header("Location: ../cart.php");
    exit();
}else{

    header("Location: ../cart.php");
    exit();
}
