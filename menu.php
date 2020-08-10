<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";
?>

// Sources: 
// https://www.w3schools.com/howto/howto_js_tabs.asp
// https://getbootstrap.com/docs/4.0/components/modal/

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

   //<?php include_once './api//menu/searchmenu.php'; ?> 

   <form method="POST" id="search" name="search" action="./api//menu/searchmenu.php">
        <div class="row">
            <div class="col-11">
                <input class="form-control mr-sm-2" type="text" name="search-term" required>
            </div>
            <div class="col-1">
               <button name="search-form" class="btn btn-secondary-color">Search</button>
            </div>
        </div>
    </form>
    
   <div id="search-table">
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
                        <th scope='row'>{$row['name']}</th>
                        <td>{$row['description']}</td>
                        <td>{$row['price']}</td>
                     </tr>";
            }
         }
         ?>
         </tbody>
      </table>
   </div>

   <div class="menucontent" id="breakfast">
        <?php
        $q = "SELECT category_desc FROM categories WHERE category_id = 8";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
        }
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
                    $q = "SELECT item_id, item_name, item_price, item_desc, take_out FROM menu WHERE item_category = 8;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        echo '<td class="itemName"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="itemPrice">' . $row['item_price'] . '</td><td class="itemTakeout text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                    }
                    ?>
                    
            </tbody>
        </table>
        <p class="desc">Add fruit, 1/4 cup, to panackes or waffles for $0.79 <br> Add fruit, 1/2 cup, to pancakes or waffles for $1.49 </p>
    </div>

    <div id="lunch" class="menucontent">
        <?php
        $q = "SELECT category_desc FROM categories WHERE category_id = 9";
        $result = $conn->query($q);
        if ($row = $result->fetch_assoc()) {
            echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
        }
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
                    $q = "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE item_category = 9;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        echo '<td class="name"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="price">' . $row['item_price'] . '</td><td class="text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
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
            echo '<p class="category-desc">' . $row['category_desc'] . '</p>';
        }
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
                    $q = "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE item_category = 1;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        echo '<td class="name"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="price">' . $row['item_price'] . '</td><td class="text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
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
               <th scope="col" class="text-center">Takeout</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <?php
                  $q = "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE item_category = 10;";
                  $result = $conn->query($q);
                  while ($row = $result->fetch_assoc()) {
                        echo '<td class="name"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="price">' . $row['item_price'] . '</td><td class="text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
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
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE item_category = 11;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        echo '<td class="name"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="price">' . $row['item_price'] . '</td><td class="text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
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
                    <th scope="col" class="text-center">Takeout</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $q = "SELECT item_name, item_desc, item_price, take_out FROM menu WHERE item_category = 12;";
                    $result = $conn->query($q);
                    while ($row = $result->fetch_assoc()) {
                        echo '<td class="name"><a href="#addToCartModal" data-toggle="modal">' . $row['item_name'] . '</a></td><td class="price">' . $row['item_price'] . '</td><td class="text-center"><span class="takeout">' . $row['take_out'] . '</span></td></tr>';
                    }
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
require "./includes/dbDisconnect.php";
include_once "./includes/footer.php";
?>
