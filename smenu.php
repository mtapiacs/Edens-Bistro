<?php
include_once "./includes/header.php";
?>

<?php

// SOURCES: 
// https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php
// https://www.php.net/manual/en/mysqli-stmt.bind-result.php

if (isset($_POST["search-form"])) {
    require "./includes/dbConnect.php";

    $searchTerm = $_POST["search-term"];

    // Check If Mysqli Error
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $query = "SELECT item_id, item_name, item_desc FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);";

    // Create Prepared Statement
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $query)) {
        // Bind Input Param
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);

        // Run Query
        mysqli_stmt_execute($stmt);

        // Attach Result To Vars Below
        mysqli_stmt_bind_result($stmt, $item_id, $item_name, $item_desc);

        // Get Results -> Store In Associative, JSON-Like Obj
        $results = array();
        while (mysqli_stmt_fetch($stmt)) {
            $results[] = array("id" => $item_id, "name" => $item_name, "description" => $item_desc);
        }

        // Close Statement
        mysqli_stmt_close($stmt);
    }

    require "./includes/dbDisconnect.php";
}

?>

<main class="main-container">
    <h2 class="page-header">Menu</h2>
    <div class="sidenav">
        <a href="#">All Items</a>
        <a href="#">Breakfast</a>
        <a href="#">Lunch </a>
        <a href="#">Dinner</a>
        <a href="#">Sides</a>
        <a href="#">Desserts</a>
        <a href="#">Drinks</a>
    </div>
    <form method="POST" id="search" name="search" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="row">
            <div class="col-11">
                <input class="form-control" type="text" name="search-term" required>
            </div>
            <div class="col-1">
                <button name="search-form" class="btn btn-site-main">Search</button>
            </div>
        </div>
    </form>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($results)) {
                foreach ($results as $row) {
                    echo "
                    <tr>
                        <th scope='row'>{$row['id']}</th>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                    </tr> 
                    ";
                }
            }
            ?>
        </tbody>
    </table>
</main>

<?php
include_once "./includes/footer.php";
?>