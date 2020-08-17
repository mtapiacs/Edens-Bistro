// Source: http://talkerscode.com/webtricks/sort-mysql-table-using-php.php

<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";

$showSearchTable = false;

if (isset($_POST["search-form"])) {
    require "./includes/dbConnect.php";
    $searchTerm = $_POST["search-term"];

    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, "SELECT item_name, item_desc, item_price, take_out FROM menu;")) {
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
               <th scope="col">Takeout</th>
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
   
   <div id="admin-menu-table" class="menucontent">
      <table class="table table-borderless">
         <thead>
            <tr>
               <th scope='col'><a href='menu-manage.php?orderby=name&order=".$order."'>Name</a></th>
               <th scope='col'><a href='menu-manage.php?orderby=price&order=".$order."'>Price</a></th>
               <th scope='col'><a href='menu-manage.php?orderby=desc&order=".$order."'>Description</a></th>
               <th scope='col'><a href='menu-manage.php?orderby=takeout&order=".$order."'>Takeout</a></th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <?php
                  require "./includes/dbConnect.php";
                  $result = mysqli_query($conn, "SELECT * from menu;");
                  while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>
                                 <td class='itemName'>".$row['item_name']."</td>
                                 <td class='itemPrice'>".$row['item_price']."</td>
                                 <td class='itemDesc'>".$row['item_desc']."</td>
                                 <td class='itemTakeout text-center'>".$row['take_out']."</td>
                              </tr>";
                        }
                  require "./includes/dbDisconnect.php"
               ?>
         </tbody>
      </table>
   </div>
</main>