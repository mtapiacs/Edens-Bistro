<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";

$showSearchTable = false;

if (isset($_POST["search-form"])) {
    require "./includes/dbConnect.php";
    $searchTerm = $_POST["search-term"];

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);")) {
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $item_name, $item_desc, $item_price, $take_out);

        $results = array();
        while (mysqli_stmt_fetch($stmt)) {
            $results[] = array("name" => $item_name, "description" => $item_desc, "price" => $item_price, "takeout" => $take_out);
        }
        mysqli_stmt_close($stmt);
    }
    require "./includes/dbDisconnect.php";

    $showSearchTable = true;
}

?>

<main class="main-container">
   // Searching the menu database table 
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

   // Displaying search results
   <div id="search-table" class="<?php echo $showSearchTable ? '' : 'hide-search-table' ?>">
      <table class='table table-borderless'>
         <thead>
            <tr>
               <th scope='col'>Name</th>
               <th scope='col'>Description</th>
               <th scope='col'>Price</th>
               <th scope='col'>Takeout</th>
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
                                 <td>{$row['take_out']}</td>
                              </tr>";
                  }
               } else {
                  echo "No results found :(";
               }
            ?>
         </tbody>
      </table>
   </div>
</main>