<?php
include_once 'header.php';
if (isset($_SESSION['cart_prod_name'])) {
    echo "<table border='1  '>
		<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Vendor</th>
		</tr>";

    $prod_name = $_SESSION['cart_prod_name'];
    $prod_price = $_SESSION['cart_prod_price'];
    $vendor_name = $_SESSION['cart_vendor_name'];

    for ($i = 0; $i < count($_SESSION['cart_prod_name']); $i++) {
        echo "<tr>";
        echo "<td>" . $prod_name[$i] . "</td>";
        echo "<td>" . "$" . $prod_price[$i] . "</td>";
        echo "<td>" . $vendor_name[$i] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo"<form class='signup-form' action= orderBank.php  method= 'POST'>
					<input type= 'submit' name= 'submit' value= 'Proceed to Checkout using bank'/>
		 </form>";
    echo"<form class='signup-form' action= orderCard.php  method= 'POST'>
					<input type= 'submit' name= 'submit' value= 'Proceed to Checkout using card'/>
		 </form>";
} else {
    echo "Sorry Cart Empty";
}
include_once 'footer.php';
?>
