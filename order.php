<?php
require "./includes/isAuthenticated.php";
include_once "./includes/header.php";

include_once "./includes/helpers/main.php";
?>

<main class="main-container">
    <h2 class="page-header">Order</h2>
    Order Page! Our login works!!! YAY!

    <br>

    <?php
    outputSession();
    ?>
</main>


<?php
include_once "./includes/footer.php";
?>