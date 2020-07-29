<?php
require "./includes/isAuthenticated.php";
include_once "./includes/header.php";

include_once "./includes/helpers/main.php";
?>

<?php
if (isset($_POST["clean-cart"])) {
    $_SESSION["cart"] = array();
} else if (isset($_POST["process-order"])) {
    // TODO: Will Be Submitted From Form In Modal
}
?>

<main class="main-container">
    <h2 class="page-header">Order</h2>
    <?php
    $cart = $_SESSION["cart"];

    if (count(array_keys($cart)) === 0) {
        echo "Cart is empty! Visit Menu!";
    } else {
        $total = 0;
        foreach ($cart as $item_id => $item_data) {
            $total += $item_data['total'];
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$item_data['name']} - \${$item_data['price']}</h5>";
            echo "<p class='card-text'>Ordered: {$item_data['quantity']} = Total: {$item_data['total']}</p>";
            echo "</div>";
            echo "</div>";
        }

        echo "<h3 class='text-center my-4'>Order Total: \${$total}</h3>";
    }

    ?>

    <div class="row">
        <div class="col-sm-3 offset-sm-2">
            <form class="mb-3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <button class="btn btn-danger btn-block" type="submit" name="clean-cart">Clear Cart</button>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-site-main btn-block" data-toggle="modal" data-target="#placeOrderModal">
                Make Payment
            </button>
        </div>
    </div>
    <div class="modal fade" id="placeOrderModal" tabindex="-1" role="dialog" aria-labelledby="placeOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="placeOrderModalLabel">Enter Payment Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- // TODO: Add Payment Stuff To Modal // -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="process-order" class="btn btn-site-main">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <hr>
    <h3 class="mb-3">Factory Starts Here 😂 | Will Not Be In Production</h3>

    <?php
    require "./includes/dbConnect.php";

    $sql = "SELECT * FROM menu;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='mb-3'>";
            echo    "<h4>{$row['item_name']} - {$row['item_price']}</h4><input class='form-control w-50 d-inline-block mr-2' id='{$row['item_id']}-qty' type='number'/><button class='btn btn-site-main' onClick='addToCart({$row['item_id']})'>Add Item</button>";
            echo "</div>";
        }
    } else {
        echo "No results";
    }

    require "./includes/dbDisconnect.php";

    outputSession();
    ?>
</main>


<?php
include_once "./includes/footer.php";
?>