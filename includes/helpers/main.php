<?php

// ************** GENERIC ************** //
function outputSession()
{
    echo "<h2>Session Variable</h2>";

    echo "<hr><h3>Entire Session</h3>";
    var_dump($_SESSION);
    echo "<hr>";

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
        $row = mysqli_fetch_assoc($result);
        return $row["Auto_increment"];
    } else {
        return "";
    }

    require "./includes/dbDisconnect.php";
}

function calculateCartTotal()
{
    $cart = $_SESSION["cart"];

    $chargeTotal = 0;
    foreach ($cart as $item_id => $item_data) {
        $chargeTotal += $item_data['total'];
    }
    return $chargeTotal;
}

// ************** () ************** //
