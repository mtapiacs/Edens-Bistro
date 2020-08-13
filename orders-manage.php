<?php
include_once "./includes/header.php";
?>

<main class="main-container">
    <h2 class="page-header mb-4">Manage Orders</h2>
    <select value="<?php echo isset($_GET['oid']) ? $_GET['oid'] : '' ?>" class="form-control w-75 mx-auto mb-4" onchange="location.replace(`./orders-manage.php?oid=${this.value}`);">
        <?php
        echo "<option value='0' selected disabled>Select an order</option>";

        require "./includes/dbConnect.php";

        $sql = "SELECT order_id, first_name, last_name FROM orders INNER JOIN users ON users.user_id = orders.customer;";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['order_id']}'>{$row['order_id']} | {$row['first_name']} {$row['last_name']}</option>";
            }
        } else {
            echo "0 results";
        }
        require "./includes/dbDisconnect.php";
        ?>
    </select>


    <table class="table mb-4">
        <thead>
            <tr>
                <th scope="col">Quantity</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "./includes/dbConnect.php";

            $sql = "SELECT transaction_id, quantity, first_name, last_name, email, phone, username, item_name, item_price FROM orders INNER JOIN order_items ON orders.order_id = order_items.order_id INNER JOIN users ON orders.customer = users.user_address INNER JOIN menu ON order_items.menu_item_id = menu.item_id WHERE orders.order_id = ?;";
            $orderId = isset($_GET["oid"]) ? $_GET["oid"] : 0;

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                print "Failed to prepare statement \n";
            } else {
                mysqli_stmt_bind_param($stmt, "i", $orderId);

                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                $total = (float) 0;

                while ($row = mysqli_fetch_array($result)) {
                    $localTotal = $row["item_price"] * $row["quantity"];
                    $total += $localTotal;
                    echo "
                        <tr>
                            <td>{$row['quantity']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['item_name']}</td>
                            <td>{$row['item_price']}</td>
                            <td>{$localTotal}</td>
                        </tr>
                    ";
                }
            }

            mysqli_stmt_close($stmt);

            require "./includes/dbDisconnect.php";
            ?>
        </tbody>
    </table>
    <h3 class="text-center">
        <?php echo "Order Total: $$total"; ?>
    </h3>
</main>

<?php
include_once "./includes/footer.php";
?>