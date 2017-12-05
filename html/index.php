<?php
include_once 'header.php';
?>

<section class="main-container">
<div class = main-wrapper>
    <?php
    if(isset($_SESSION['user_id'])){
        echo
        '<div class = search-bar>"Welcome to store app!"</div>
            <form class="search-bar">
                <input type="text" name = "searchbar" placeholder="Search for item">
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