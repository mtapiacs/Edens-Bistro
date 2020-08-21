<?php

// ************** GENERIC ************** //
function outputSession()
{
    // Outputs Session
    echo "<h2>Session Variable</h2>";

    echo "<hr><h3>Entire Session</h3>";
    var_dump($_SESSION);
    echo "<hr>";

    // Checks Every Item In Session
    foreach ($_SESSION as $key => $value) {
        echo "<h4 class='my-3 color-primary '>{$key}</h4>";
        if ($key === "cart") {
            foreach ($value as $itemId => $itemData) {
                echo "<div class='mb-3'>";
                echo "<h5>Item Id: {$itemId}</h5>";
                var_dump($itemData);
                echo "</div>";
            }
        } else {
            var_dump($value);
        }
    }
}

// ************** ORDER PROCESSING ************** //
function getUserData($userId)
{
    require "./includes/dbConnect.php";

    // No Need For Prepared Statements, Since User Id Is Set On The Server On Session On Authentication
    $sql = "SELECT * FROM users INNER JOIN addresses ON users.user_address = addresses.address_id WHERE user_id = {$userId};";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return "";
    }

    require "./includes/dbDisconnect.php";
}


function getNextOrderId()
{
    require "./includes/dbConnect.php";

    $sql = "SHOW TABLE STATUS LIKE 'orders';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Get Auto_Increment Value From Show
        $row = mysqli_fetch_assoc($result);
        return $row["Auto_increment"];
    } else {
        return "";
    }

    require "./includes/dbDisconnect.php";
}

function calculateCartTotal()
{
    // Get Total For The Cart
    $cart = $_SESSION["cart"];

    $chargeTotal = 0;
    foreach ($cart as $item_id => $item_data) {
        // Add Total For Each Item
        $chargeTotal += $item_data['total'];
    }

    return $chargeTotal;
}

function composeCartInsertString($orderId)
{
    $cart = $_SESSION["cart"];
    $sqlInsertString = "";

    // Compose Insert Item String Based On OrderId
    foreach ($cart as $itemId => $itemData) {
        $qty = $itemData['quantity'];
        $sqlInsertString .= "INSERT INTO order_items (quantity, order_id, menu_item_id) VALUES ($qty, $orderId, $itemId); ";
    }

    return $sqlInsertString;
}

function calculateOrdersTotal()
{
    // Calculates Orders Total For Orders Manage
    require "./includes/dbConnect.php";

    $sql = "SELECT SUM(quantity) * item_price AS local_total, SUM(quantity) AS item_qty, item_price FROM orders INNER JOIN order_items ON orders.order_id = order_items.order_id INNER JOIN menu ON order_items.menu_item_id = menu.item_id GROUP BY item_id;";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $total = (float) 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $total += $row['local_total'];
        }
        return $total;
    } else {
        return "No results";
    }

    require "./includes/dbDisconnect.php";
}

// ************** () ************** //
