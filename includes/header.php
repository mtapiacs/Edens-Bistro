<!DOCTYPE html>
<html lang="en">
<?php
//* Initializing Current Page Variable: https://stackoverflow.com/questions/13032930/how-to-get-current-php-page-name
$currentPage = basename($_SERVER["PHP_SELF"]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isAdmin = isset($_SESSION["isAdmin"]) ? $_SESSION["isAdmin"] : null;
$isLoggedIn = isset($_SESSION["userId"])

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="./img/EB2.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/main.css" />

    <?php

    if ($currentPage === "reservation_calendar.php" || $currentPage === "reservation_manage_calendar.php") {
        echo '
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        ';
    } else {
        echo '
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
         ';
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Eden's Bistro</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-main-green fixed-top">
        <a class="navbar-brand" href="#">Eden's Bistro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo $currentPage === "index.php" ? 'active' : '' ?>">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo $currentPage === "events.php" ? 'active' : '' ?>">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item <?php echo $currentPage === "menu.php" ? 'active' : '' ?>">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item dropdown <?php echo ($currentPage === "reservation_calendar.php" || $currentPage === 'reservation.php') ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOrder" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownOrder">
                        <a class="dropdown-item" href="reservation.php">Make Reservation</a>
                        <a class="dropdown-item" href="reservation_calendar.php">Reservation Calendar</a>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="order.php?a=pickup">Pickup Status</a> -->
                    </div>
                </li>
                <li class="nav-item <?php echo $currentPage === "order.php" ? 'active' : '' ?>">
                    <a class="nav-link" href="order.php">Order</a>
                </li>

                <?php
                if ($isLoggedIn && $isAdmin) {
                    $adminPages = array("orders-manage.php", "index-manage.php", "register-manage.php", "reservation-manage.php", "events-manage.php");
                    $activeClass = in_array($currentPage, $adminPages) ? "active" : "";
                    echo "<li class='nav-item dropdown $activeClass'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownOrder' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Manage
                            </a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdownOrder'>
                                <a class='dropdown-item' href='index-manage.php'>Index</a>
                                <a class='dropdown-item' href='orders-manage.php'>Orders</a>
                                <a class='dropdown-item' href='register-manage.php'>Register</a>
                                <a class='dropdown-item' href='reservation-manage.php'>Reservation</a>
                                <a class='dropdown-item' href='events-manage.php'>Events</a>
                            </div>
                        </li>";
                }
                ?>

                <li class="nav-item <?php echo $currentPage === "login.php" ? 'active' : '' ?>">
                    <?php

                    // User Has A Session => Logged In, So Show Logout
                    if ($isLoggedIn) {
                        echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    } else { // Else Show Login
                        echo "<a class='nav-link' href='login.php'>Login</a>";
                    }

                    ?>
                </li>
                <?php

                // Don't Show Register If Logged In
                if (!$isLoggedIn) {
                    $activeClass = $currentPage === 'register.php' ? 'active' : '';
                    echo "<li class='nav-item {$activeClass}'><a class='nav-link' href='register.php'>Register</a></li>";
                }

                ?>

            </ul>
        </div>
    </nav>