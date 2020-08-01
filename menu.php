<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";
?>

<main class="main-container">
    <h3 class="page-header">Menu</h3>

    <div class="categories">
        <a class="menuitems" href="#" onClick="openDiv(event, 'breakfast')" id="defaultOpen">Breakfast</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'lunch')">Lunch</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'dinner')">Dinner</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'sides')">Sides</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'desserts')">Desserts</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'drinks')">Drinks</a>
    </div>

    <div class="menucontent" id="breakfast">
        <?php
        $q = "SELECT category_desc FROM categories WHERE category_id = 8";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            echo '<p class="desc">' . $row['category_desc'] . '</p>';
        }
        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="takeout-header">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 8;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
        <p class="desc"><br>Add fruit, 1/4 cup, to panackes or waffles for $0.79 <br> Add fruit, 1/2 cup, to pancakes or waffles for $1.49 </p>
    </div>

    <div id="lunch" class="menucontent">
        <?php
        $q = "SELECT category_desc FROM categories WHERE category_id = 9";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            echo '<p class="desc">' . $row['category_desc'] . '</p>';
        }
        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 9;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <div id="dinner" class="menucontent">
        <?php
        $q = "SELECT category_desc FROM categories WHERE category_id = 1";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            echo '<p class="desc">' . $row['category_desc'] . '</p>';
        }
        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th class="text-center" scope="col">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 1;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td class="text-center"><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <div id="sides" class="menucontent">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 10;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <div id="desserts" class="menucontent">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 11;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <div id="drinks" class="menucontent">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 12;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="item-link" href="#">' . $itemname . '</a></td><td>' . $itemprice . '</td><td><span class="takeout">' . $takeout . '</span></td></tr>';
                    }
                    ?>
            </tbody>
        </table>
    </div>
</main>

<script type="text/javascript" src="./js/menu.js"></script>

<?php
include_once "./includes/footer.php";
?>