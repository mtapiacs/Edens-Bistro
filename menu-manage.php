<?php
require "./includes/header.php";
require "./includes/dbConnect.php";

if (isset($_POST["search-form"])) {
    require "./includes/dbConnect.php";

    $searchTerm = $_POST["search-term"];

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT item_id, item_name, item_desc, item_price, take_out FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);")) {
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $item_id, $item_name, $item_desc, $item_price, $take_out);

        $results = array();
        while (mysqli_stmt_fetch($stmt)) {
            $results[] = array("id" => $item_id, "name" => $item_name, "description" => $item_desc, "price" => $item_price, "takeout" => $take_out);
        }

        mysqli_stmt_close($stmt);
    }
    require "./includes/dbDisconnect.php";
}
?>

<main class="main-container">
    <h3 class="page-header">Menu</h3>
    <form class="mb-4" method="POST" id="search" name="search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row">
            <div class="col-6 offset-2">
                <input class="form-control " type="text" name="search-term" required>
            </div>
            <div class="col-2">
                <button type="submit" name="search-form" class="btn btn-site-main">Search</button>
            </div>
        </div>
    </form>

    <div id="search-table">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                    <th scope="col">Takeout</th>
                    <th scope="col">Modify</th>
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
                                <td>{$row['takeout']}</td>
                                <td>
                                    <button class=\"btn btn-site-main\" onclick='populateModal(\"{$row['id']}\", true)'>Modify</button>
                                </td>
                            </tr>";
                    }
                } else {
                    require "./includes/dbConnect.php";

                    $sql = "SELECT item_id AS id, item_name AS name, item_desc AS description, item_price AS price, take_out AS takeout FROM menu;";
                    $res = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo
                                "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['takeout']}</td>
                                <td>
                                    <button class=\"btn btn-site-main\" onclick='populateModal(\"{$row['id']}\", true)'>Modify</button>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "No results";
                    }

                    require "./includes/dbDisconnect.php";
                }

                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modifyItemModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Modify Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" id="modal-item-title" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Price</label>
                            <input class="form-control" type="number" step=".01" id="modal-item-price" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Description</label>
                            <input class="form-control" type="text" id="modal-item-desc" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Takeout</label><br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="takeoutY">Yes &nbsp;</label>
                                <input class="form-check-input" type="radio" name="takeoutRadios" id="takeoutY" value="Y">
                                <label class="form-check-label" for="takeoutN">No &nbsp;</label>
                                <input class="form-check-input" type="radio" name="takeoutRadios" id="takeoutN" value="N">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Category</label>
                            <select class="form-control" id="modal-item-category">
                                <?php
                                require "./includes/dbConnect.php";

                                $sql = "SELECT category_id AS c_id, category_name AS c_name FROM categories;";
                                $res = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo "<option value='{$row['c_id']}'>{$row['c_name']}</option>";
                                }


                                require "./includes/dbDisconnect.php";
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Remove</label>
                            <input class="form-control" type="checkbox" id="modal-item-remove" />
                        </div>
                    </div>
                    <input id="modal-item-id" type="hidden" name="modify-item-id" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button onclick="modifyMenuItem();" id="modifyMenuItemButton" type="button" class="btn btn-site-main" data-dismiss="modal">Modify Item</button>
                </div>
            </div>
        </div>
    </div>
</main>


<script type="text/javascript" src="./js/menu.js"></script>

<?php
require "./includes/footer.php";
?>