<?php

// Start Session If Not Already Started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check If Admin
$isAdmin = isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : null;
$currentPage = basename($_SERVER["PHP_SELF"]);

// Not Logged In
if (!(isset($_SESSION["userId"]))) {
    header("Location: login.php");
    exit();
}

// Logged In But Not Admin
if (isset($isAdminPage) && !$isAdmin) {
    header("Location: ./");
    exit();
}
