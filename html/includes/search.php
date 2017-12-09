<?php
session_start();
include_once 'dbaccess.php';

$searchItem = mysqli_real_escape_string($conn, $_POST['sBar']);


if(empty($searchItem)){
    header("Location: ../empty.php");
    exit();
}else{
    $sql = "Select * from Product p inner join Vendors v on p.vendor_id = v.vendor_id left join Discounts d on p.discount_id = d.discount_id where product_name like '%$searchItem%' and order_id is null order by product_price";
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>508Proj</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href = "../index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <?php
                if(isset($_SESSION['user_id'])){
                    echo '<form action = "logout.php" method= "POST">
                            <button type= "submit" name = "submit">Logout</button>
                            </form>';
                    echo '<form action = "update.php" method= "POST">
                                <button type = "submit" name = "update" method="POST">Profile</button>
                            </form>
			                <form action = "cart.php" method= "POST">
                                <button type = "submit" name = "cart" method="POST">Cart</button>
                            </form>';
                }
                else{
                    echo '<form action="login.php" method="POST">
                    <input type="text" name = "username" placeholder = "Username">
                    <input type="password" name = "password" placeholder = "Password">
                    <button type="submit" name = "submit">Login</button>
                </form>
                <a href="signup.php">Sign Up</a>';
                }
                ?>

            </div>
        </div>
    </nav>
</header>


<section class="main-container">
    <div class = main-wrapper>
        <?php
        echo
        '<div class = search-bar>Welcome to store app!</div>
            <form class="search-bar" action="search.php" method="POST">
                <input type="text" name = "sBar" placeholder="Search for item">
                <button type="submit" name = "submit">search</button>
            </form>';

        if($resultChecker > 0){

		echo "<table border='1  '>
		<tr>
		<th>Name</th>
		<th>Price</th>
		<th>Vendor</th>
		</tr>";
		while($row = mysqli_fetch_assoc($result)) {
	        $prodID = $row['product_id'];
            	$prodName = $row['product_name'];
            	$prodPrice = $row['product_price'];
            	$vendor_id = $row['vendor_id'];
	    	$discount = $row['percent_off'];
	    	if($discount > 0) { $prodPrice = number_format($prodPrice * $discount, 2); }
	    	$vendor_name = $row['vendor_name'];
			echo "<tr>";
    			echo "<td>" . $row['product_name'] . "</td>";
    			echo "<td>" . "$" . $prodPrice . "</td>";
    			echo "<td>" . $vendor_name . "</td>";
    			echo "<td><form action= addCart.php  method= 'POST'>
					<input type='hidden' name='prod_id' value= $prodID />
					<input type='hidden' name='prod_name' value= $prodName />
					<input type='hidden' name='prod_price' value= $prodPrice />
					<input type='hidden' name='vendor_name' value= $vendor_name />
					<input type='hidden' name='vendor_id' value= $vendor_id />
					<input type= 'submit' name= 'submit' value= 'Add to Cart'/>
				</form></td>";
    			echo "</tr>";
		}
		echo "</table>";

        } else{
            echo "Sorry could not find item matching: $searchItem";
        }
        ?>
        </tbody>
        </table>
    </div>
</section>
</body>
</html>
