<?php

// https://stackoverflow.com/questions/6249707/check-if-php-session-has-already-started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Respond With Not Authenticated JSON
if (!(isset($_SESSION["userId"]))) {
    $response = array("type" => "FAIL", "message" => "Not authenticated!");
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
}

// Get Input From Client
$json = file_get_contents("php://input");
$postObj = json_decode($json);

// Route Based On Get Action
$action = $_GET["action"];

switch ($action) {
    case "AMOUNT":
        $itemId = (int) $postObj->itemId;
        $quantity = (int) $postObj->quantity;

        $item_in_cart = isset($_SESSION["cart"][$itemId]);

        // Modify Amount Based Through RESTs
        if ($item_in_cart) {
            $newQty = $quantity;
            $_SESSION["cart"][$itemId]["quantity"] = $newQty; // Set New Qty

            $newTotal = $newQty * $_SESSION["cart"][$itemId]["price"];
            $_SESSION["cart"][$itemId]["total"] = $newTotal; // Set New Total

            $response = array("type" => "SUCCESS", "message" => "Number of servings increased");
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            $response = array("type" => "FAIL", "message" => "Item not in cart");
            header("Content-Type: application/json");
            echo json_encode($response);
        }

        break;

    case "REMOVE":
        $itemId = (int) $postObj->itemId;

        $item_in_cart = isset($_SESSION["cart"][$itemId]);

        if ($item_in_cart) {
            // Unset Item From Session, Since Cart's Managed Over Session
            unset($_SESSION["cart"][$itemId]);

            $response = array("type" => "SUCCESS", "message" => "Item successfully removed");
            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            $response = array("type" => "FAIL", "message" => "Item not in cart");
            header("Content-Type: application/json");
            echo json_encode($response);
        }

        break;

    default:
        $response = "You should not be here!";
        header("Content-Type: application/json");
        echo json_encode($response);
}
