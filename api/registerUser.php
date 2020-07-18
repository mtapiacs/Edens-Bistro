<?php

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$type = $_GET["type"];

switch ($type) {
    case "REGISTER":
        $firstName = $postObj->firstName;
        $lastName = $postObj->lastName;
        $email = $postObj->email;
        $phone = $postObj->phone;

        $addressLineMain = $postObj->addressLineMain;
        $addressLineSecondary = $postObj->addressLineSecondary;
        $city = $postObj->city;
        $state = $postObj->state;
        $zip = $postObj->zip;

        $username = $postObj->username;
        $password = $postObj->password;
        $confirmPassword = $postObj->confirmPassword;

        require "../includes/dbConnect.php";

        mysqli_autocommit($conn, FALSE);

        if ($stmtAddress = mysqli_prepare($link, "INSERT INTO addresses (address_one, address_two, city, state, zip) VALUES (?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmtAddress, "ssssss", $addressLineMain, $addressLineSecondary, $city, $state, $zip);
            mysqli_stmt_execute($stmtAddress);
            mysqli_stmt_bind_result($stmtAddress, $result);
            mysqli_stmt_fetch($stmtAddress);
            mysqli_stmt_close($stmtAddress);
        }

        $addressId = mysql_insert_id();

        if ($stmtUser = mysqli_prepare($link, "INSERT INTO users (first_name, last_name, email, phone, password, username) VALUES (?, ?, ?, ?, ?, ?);")) {
            mysqli_stmt_bind_param($stmtUser, "ssssss", $firstName, $lastName, $email, $phone, $password, $username);
            mysqli_stmt_execute($stmtUser);
            mysqli_stmt_bind_result($stmtUser, $result);
            mysqli_stmt_fetch($stmtUser);
            mysqli_stmt_close($stmtUser);
        }



        // Commit transaction
        if (!$mysqli_commit($conn)) {
            echo "Commit transaction failed";
            exit();
        }


        require "../includes/dbDisconnect.php";

        header('Content-type: application/json');
        echo json_encode(array("message" => "SUCCESS"));

        return;

    case "VALIDATE":

    default:
        $response = "You should not be here!";
        echo json_encode($response);
}
