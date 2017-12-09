<?php
include_once 'header.php';
?>

<section class="main-container">
<div class = main-wrapper>
    <?php
    if(isset($_SESSION['user_id'])){
        echo
        '<div class = search-bar>Welcome to store app!</div>
            <form class="search-bar" action="includes/search.php" method="POST">
                <input type="text" name = "sBar" placeholder="Search for item">
                <button type="submit" name = "submit">search</button>
            </form>';
    }
    else{
        echo'<h2>Please log-in</h2>';
    }
    ?>

</div>
</section>

<?php
include_once 'footer.php';
?>
