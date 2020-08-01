<?php

$json = file_get_contents("php://input");
$postObj = json_decode($json);

$type = $_GET["type"];

switch ($type) {
    case "REGISTER":
        if (!allPagesValid()) {
            $response = array("type" => "FAIL", "message" => "You have an invalid value");
            header('Content-type: application/json');
            echo json_encode($response);
            break;
        }

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

        require "../../includes/dbConnect.php";

        // NOTE: Prepared Statements Used Inside Stored Procedure. The Procedure Leverages The Power Of Transactions.
        $stmt = mysqli_prepare($conn, "CALL RegisterUser(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, "sssssssssss", $addressLineMain, $addressLineSecondary, $city, $state, $zip, $firstName, $lastName, $email, $phone, $password, $username);

        $deleteRecord = mysqli_stmt_execute($stmt);

        require "../../includes/dbDisconnect.php";

        if ($deleteRecord === false) {
            header('Content-type: application/json');
            echo json_encode(array("message" => "FAIL"));
        } else {
            header('Content-type: application/json');
            echo json_encode(array("message" => "SUCCESS"));
        }

        break;

    case "VALIDATE":
        $page = (int)$_GET["page"];

        if ($page === 1) {
            $message = validatePage1();
        } else if ($page === 2) {
            $message = validatePage2();
        } else if ($page === 3) {
            $message = validatePage3();
        }

        header("Content-Type: application/json");
        echo json_encode($message);

        break;

    default:
        $response = "You should not be here!";
        echo json_encode($response);
}

//***************** Validation *****************//
// General / Contact Info
function validatePage1()
{
    global $postObj;

    $firstName = $postObj->firstName;
    $lastName = $postObj->lastName;
    $email = $postObj->email;
    $phone = $postObj->phone;

    $isFirstName = preg_match("/^[a-z ,.'-]+$/i", $firstName) && strlen($firstName) <= 50;
    $isLastName = preg_match("/^[a-z ,.'-]+$/i", $lastName) && strlen($lastName) <= 50;
    $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) <= 255;
    $isUniqueEmail = checkUniqueUsernameOrEmail($email);
    $isPhone = preg_match("/[0-9]{3}-[0-9]{3}-[0-9]{4}/", $phone);

    if ($isFirstName && $isLastName && $isEmail && $isUniqueEmail && $isPhone) {
        return array("type" => "SUCCESS", "message" => "Looks good!");
    } else {
        return array("type" => "FAIL", "message" => "You have an invalid value");
    }
}

// Addresses
function validatePage2()
{
    // TODO: Use Regex For Common Addresses
    global $postObj;

    $addressLineMain = $postObj->addressLineMain;
    $addressLineSecondary = $postObj->addressLineSecondary;
    $city = $postObj->city;
    $state = $postObj->state;
    $zip = $postObj->zip;

    $isAddressLineMain = strlen($addressLineMain) <= 255 && strlen($addressLineMain) >= 1;
    $isAddressLineSecondary = strlen($addressLineSecondary) <= 255;
    $isCity = strlen($city) <= 100 && strlen($city) >= 1;
    $isState = strlen($state) <= 100 && strlen($state) >= 1;
    $isZipCode = preg_match("/^[0-9]{5}(?:-[0-9]{4})?$/", $zip);

    if ($isAddressLineMain && $isAddressLineSecondary && $isCity && $isState && $isZipCode) {
        return array("type" => "SUCCESS", "message" => "Looks good!");
    } else {
        return array("type" => "FAIL", "message" => "You have an invalid value");
    }
}

// User Data (Username, Passwords)
function validatePage3()
{
    global $postObj;

    $username = $postObj->username;
    $password = $postObj->password;
    $confirmPassword = $postObj->confirmPassword;

    $isUsername = preg_match("/^[a-z0-9]{3,16}$/", $username);
    $isUniqueUsername = checkUniqueUsernameOrEmail($username);
    $isValidPassword = preg_match("/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/", $password);
    $isSamePassword = $password === $confirmPassword;

    if ($isUsername && $isUniqueUsername && $isValidPassword && $isSamePassword) {
        return array("type" => "SUCCESS", "message" => "Looks good!");
    } else {
        return array("type" => "FAIL", "message" => "You have an invalid value");
    }
}

//***************** Helpers *****************//
function hashPassword($incomingPassword)
{
    $hashedPassword = password_hash($incomingPassword, PASSWORD_DEFAULT);
    return $hashedPassword;
}

function checkUniqueUsernameOrEmail($value)
{
    require "../../includes/dbConnect.php";

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT user_id FROM users WHERE email = ? OR username = ?;")) {
        mysqli_stmt_bind_param($stmt, "ss", $value, $value);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $result);

        mysqli_stmt_fetch($stmt);

        mysqli_stmt_close($stmt);
    }

    require "../../includes/dbDisconnect.php";

    return !$result ? true : false;
}

function allPagesValid()
{
    $vP1 = validatePage1();
    $vP2 = validatePage2();
    $vP3 = validatePage3();

    $p1Valid = $vP1["type"] === "SUCCESS";
    $p2Valid = $vP2["type"] === "SUCCESS";
    $p3Valid = $vP3["type"] === "SUCCESS";

    if ($p1Valid && $p2Valid && $p3Valid) {
        return true;
    } else {
        return false;
    }
}
