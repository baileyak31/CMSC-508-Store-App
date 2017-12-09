<?php
include_once 'header.php';
include_once 'includes/dbaccess.php';
?>

<section class="signup-form">
    <div class="signup-form">
    <?php
        $hidden = "update-password.php";
        if(isset($_SESSION['user_id'])){
            $userID = $_SESSION['user_id'];
            $sql = "Select customer_username,first_name,last_name,customer_address from Customer where customer_id = '$userID'";
            $result = mysqli_query($conn, $sql);
            $allRows = mysqli_fetch_assoc($result);
            $username = $allRows['customer_username'];
            $firstName = $allRows['first_name'];
            $lastName = $allRows['last_name'];
            $address = $allRows['customer_address'];

            echo "<form class = 'signup-form' action='card_bankUpdate.php' method='POST'>
                        <button type ='submit' name = 'card'>Edit Bank/Card info</button>
                  </form>
                    </br>Update only what you would like changed.";

            echo "<form class = 'signup-form' action='includes/$hidden' method='POST'>
                        <input type='password' name = 'current' placeholder='Current Password'>
                        <input type='password' name = 'newpass' placeholder='New Password'>
                        <button type='submit' name = 'submit'>Update Password</button>
                  </form>";

            echo "<form class = 'signup-form' action='includes/update-form.php' method='POST'>
                        <input type='text' name = 'username' placeholder='Username: $username'>
                        <input type='text' name = 'first' placeholder='First Name: $firstName'>
                        <input type='text' name = 'last' placeholder='Last Name: $lastName'>
                        <input type='text' name = 'address' placeholder='Address: $address'>
                        <button type='submit' name = 'submit'>Update Values</button>
                  </form>";

            echo "</br></br></br> ONLY PRESS THIS IF YOU WANT TO DELETE YOUR ACCOUNT
                  <form class = 'signup-form' action='includes/deleteAccount.php' method='POST'>
                        <button type ='submit' name = 'delete'>DELETE ACCOUNT</button>
                  </form>";
        }

    ?>



</div>
</section>

<?php
include_once 'footer.php';
?>

