<?php
include_once "./includes/header.php";

// Sources:
// https://www.w3schools.com/howto/howto_js_tabs.asp
// https://getbootstrap.com/docs/4.0/components/modal/

$showSearchTable = false;

if (isset($_POST["search-form"])) {
    require "./includes/dbConnect.php";
    $searchTerm = $_POST["search-term"];

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT item_name, item_desc, item_price FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);")) {
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $item_name, $item_desc, $item_price);

        $results = array();
        while (mysqli_stmt_fetch($stmt)) {
            $results[] = array("name" => $item_name, "description" => $item_desc, "price" => $item_price);
        }
        mysqli_stmt_close($stmt);
    }
    require "./includes/dbDisconnect.php";

    $showSearchTable = true;
}

?>

<main class="main-container">
    <h3 class="page-header">Menu</h3>
    <div class="row categories">
        <a class="menuitems" href="#" onClick="openDiv(event, 'breakfast')" id="defaultOpen">Breakfast</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'lunch')">Lunch</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'dinner')">Dinner</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'sides')">Sides</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'desserts')">Desserts</a>
        <a class="menuitems" href="#" onClick="openDiv(event, 'drinks')">Drinks</a>
    </div>

    <form method="POST" id="search" name="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="row">
            <div class="col-11">
                <input class="form-control mr-sm-2" type="text" name="search-term" required>
            </div>
            <div class="col-1">
                <button type="submit" name="search-form" class="btn btn-secondary-color">Search</button>
            </div>
            <div class="break" style="padding: 4px"></div>
        </div>
    </form>

    <div id="search-table" class="<?php echo $showSearchTable ? '' : 'hide-search-table' ?>">
        <table class='table table-borderless'>
            <thead>
                <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($results)) {
                    foreach ($results as $row) {
                        echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['price']}</td>
                     </tr>";
                    }
                } else {
                    echo "No results found :(";
                    //header('Location: menu.php');
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="menucontent" id="breakfast">
        <?php
        require "./includes/dbConnect.php";

        $result = mysqli_query($conn, "SELECT category_desc FROM categories WHERE category_id = 8");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
            }
        } else {
            echo "0 results";
        }

        require "./includes/dbDisconnect.php";

        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 8;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
                    ?>
            </tbody>
        </table>
        <p class="desc">Add fruit, 1/4 cup, to panackes or waffles for $0.79 <br> Add fruit, 1/2 cup, to pancakes or waffles for $1.49 </p>
    </div>

    <div id="lunch" class="menucontent">
        <?php
        require "./includes/dbConnect.php";

        $result = mysqli_query($conn, "SELECT category_desc FROM categories WHERE category_id = 9");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
            }
        } else {
            echo "0 results";
        }

        require "./includes/dbDisconnect.php";
        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 9;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
                    ?>
            </tbody>
        </table>
    </div>

    <div id="dinner" class="menucontent">
        <?php
        require "./includes/dbConnect.php";

        $result = mysqli_query($conn, "SELECT category_desc FROM categories WHERE category_id = 1");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
            }
        } else {
            echo "0 results";
        }

        require "./includes/dbDisconnect.php";
        ?>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 1;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
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
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 10;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
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
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 11;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
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
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    require "./includes/dbConnect.php";

                    $result = mysqli_query($conn, "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 12;");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                        }
                    } else {
                        echo "0 results";
                    }

                    require "./includes/dbDisconnect.php";
                    ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addToCartModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="modal-item-desc"></p>
                    <p class="modal-item-price"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="cartBtn" type="button" class="btn btn-secondary-color" data-dismiss="modal">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

</main>

<script type="text/javascript" src="./js/menu.js"></script>

<?php
include_once "./includes/footer.php";
?>