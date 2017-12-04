<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class = main-wrapper>
            <h2>Sign-up</h2>
            <form class = "signup-form" action="includes/signup-inc.php" method="POST">
                <input type="text" name = "first" placeholder="First Name">
                <input type="text" name = "last" placeholder="Last Name">
                <input type="text" name = "username" placeholder="Username">
                <input type="password" name = "password" placeholder="Password">
                <input type="text" name = "address" placeholder="Address">
                <button type="submit" name = "submit">Sign up</button>

            </form>
        </div>
    </section>

<?php
include_once 'footer.php';
?>