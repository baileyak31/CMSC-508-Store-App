<?php
include_once 'includes/dbaccess.php';
include_once 'header.php';
if(isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM Payment where customer_id = '$user_id' and bank_id is not null";
    $query = mysqli_query($conn, $sql);
    $numResults = mysqli_num_rows($query);
    $prod_id = $_SESSION['cart_prod_id'];

    if ($numResults > 0) {
        $date = date("Y-m-d");
        $time = date("h:i:s");
        $insert = "Insert into Orders (order_date, order_time,customer_id) VALUES ('$date','$time','$user_id')";
        mysqli_query($conn, $insert);
        $order_id_query = "SELECT MAX(order_id) FROM Orders WHERE customer_id = '$user_id'";
        $order_id_result = mysqli_query($conn, $order_id_query);
	    $order_id_row = mysqli_fetch_assoc($order_id_result);
	    $order_id = $order_id_row['MAX(order_id)'];
	        for($i = 0; $i < count($prod_id); $i++) {
            $prod = $prod_id[$i];
            $update_prod = "UPDATE Product SET order_id = $order_id WHERE product_id = $prod";
            mysqli_query($conn, $update_prod);
        }
        $_SESSION['cart_prod_id'] = array();
        $_SESSION['cart_prod_name'] = array();
        $_SESSION['cart_prod_price'] = array();
        $_SESSION['cart_vendor_id'] = array();
        $_SESSION['cart_vendor_name'] = array();
        header("Location: success.php");
        exit();
    } else {
        header("Location: error.php");
        exit();
    }

}else{
    header("Location: error.php");
    exit();
}

include_once 'footer.php';
?>
