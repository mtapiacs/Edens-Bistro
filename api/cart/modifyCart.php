<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!(isset($_SESSION["userId"]))) {
    $response = array("type" => "FAIL", "message" => "Not authenticated!");
    header("Content-Type: application/json");
    echo json_encode($response);
    exit();
}

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$action = $_GET["action"];

switch ($action) {
    case "AMOUNT":
        $itemId = (int) $postObj->itemId;
        $quantity = (int) $postObj->quantity;

        $item_in_cart = isset($_SESSION["cart"][$itemId]);

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
