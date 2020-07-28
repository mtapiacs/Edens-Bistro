<?php

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$type = $_GET["type"];

switch ($type) {
    case "REGISTER":
        $firstName = $postObj->firstName;
        $lastName = $postObj->lastName;
        $email = $postObj->email;
        $phone = str_replace("-", "", $postObj->phone);

        $addressLineMain = $postObj->addressLineMain;
        $addressLineSecondary = $postObj->addressLineSecondary;
        $city = $postObj->city;
        $state = $postObj->state;
        $zip = $postObj->zip;

        $username = $postObj->username;
        $password = hashPassword($postObj->password);
        $confirmPassword = $postObj->confirmPassword;

        require "../includes/dbConnect.php";

        // NOTE: Prepared Statements Used Inside Stored Procedure. The Procedure Leverages The Power Of Transactions.
        $stmt = mysqli_prepare($conn, "CALL RegisterUser(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, "sssssssssss", $addressLineMain, $addressLineSecondary, $city, $state, $zip, $firstName, $lastName, $email, $phone, $password, $username);

        $deleteRecord = mysqli_stmt_execute($stmt);

        require "../includes/dbDisconnect.php";

        if ($deleteRecord === false) {
            header('Content-type: application/json');
            echo json_encode(array("message" => "FAIL"));
        } else {
            header('Content-type: application/json');
            echo json_encode(array("message" => "SUCCESS"));
        }

        return;

    case "VALIDATE":

    default:
        $response = "You should not be here!";
        echo json_encode($response);
}

//***************** Validation *****************//
// General / Contact Info
function validatePage1()
{
}

// Addresses
function validatePage2()
{
}

// User Data (Username, Passwords)
function validatePage3()
{
}

//***************** Helpers *****************//
function hashPassword($incomingPassword)
{
    $hashedPassword = password_hash($incomingPassword, PASSWORD_DEFAULT);
    return $hashedPassword;
}
