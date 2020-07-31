<?php

$json = file_get_contents("php://input");
$postObj = json_decode($json);

session_start();

if (!(isset($_SESSION["userId"]))) {
    $response = array("type" => "FAIL", "message" => "Not authenticated!");
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
}

// Incoming From Client
$item_id = (int)$postObj->itemId;
$quantity = (int)$postObj->quantity;

$item_in_cart = isset($_SESSION["cart"][$item_id]);

if ($item_in_cart) {
    $currentQty = $_SESSION["cart"][$item_id]["quantity"];

    $newQty = $currentQty + $quantity;
    $_SESSION["cart"][$item_id]["quantity"] = $newQty; // Set New Qty

    $newTotal = $newQty * $_SESSION["cart"][$item_id]["price"];
    $_SESSION["cart"][$item_id]["total"] = $newTotal; // Set New Total

    $response = array("type" => "SUCCESS", "message" => "Number of servings increased");
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    $desc = getItemDesc($item_id);
    $total = $desc["price"] * $quantity;
    $newItem = array("name" => $desc["name"], "quantity" => $quantity, "price" => $desc["price"], "total" => $total);

    $_SESSION["cart"][$item_id] = $newItem;

    $response = array("type" => "SUCCESS", "message" => "Item added to cart");
    header("Content-Type: application/json");
    echo json_encode($response);
}

// Returns Price & Name
function getItemDesc($item_id)
{
    require "../includes/dbConnect.php";

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT item_id, item_name, item_price FROM menu WHERE item_id = ?;")) {
        mysqli_stmt_bind_param($stmt, "i", $item_id);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $itemId, $itemName, $itemPrice);

        mysqli_stmt_fetch($stmt);

        mysqli_stmt_close($stmt);
    }

    require "../includes/dbDisconnect.php";

    return array("name" => $itemName, "price" => (float)$itemPrice);
}
