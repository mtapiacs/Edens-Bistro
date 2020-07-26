<?php
include_once "./includes/header.php";
$link = new mysqli('localhost', 'st893', 'StephanieTea', 'manhattanrc');
?>
<main class="main-container">
    <h3 class="page-header">Menu</h3>
    <div class="menu-content">
      <div class="tab">
        <button class="tablinks" onclick="openDiv(event, 'breakfast')" id="defaultOpen">Breakfast</button>
        <button class="tablinks" onclick="openDiv(event, 'lunch')">Lunch</button>
        <button class="tablinks" onclick="openDiv(event, 'dinner')">Dinner</button>
        <button class="tablinks" onclick="openDiv(event, 'sides')">Sides</button>
        <button class="tablinks" onclick="openDiv(event, 'desserts')">Desserts</button>
        <button class="tablinks" onclick="openDiv(event, 'drinks')">Drinks</button>
      </div>
      
      <div class="tabcontent" id="breakfast">
        <p class="desc">Weekday Breakfast, Served All-Day On Weekends</p>
         <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 8;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a class="menu-link" href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
        <p style="font-size:0.8em"><br>Add fruit, 1/4 cup, to panackes or waffles for $0.79 <br>
          Add fruit, 1/2 cup, to pancakes or waffles for $1.49 </p>
      </div>

      <div id="lunch" class="tabcontent">
        <p class="desc">Served through 3 PM </br>
        * all lunches come with one side</p>
        <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 9;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
      </div>

      <div id="dinner" class="tabcontent">
         <p class="desc">Starts at 3 PM and Served All-Day on Sundays <br>
         * dinners come with two sides</p>
         <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 1;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
      </div>

      <div id="sides" class="tabcontent">
        <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 10;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
      </div>

      <div id="desserts" class="tabcontent">
        <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 11;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
      </div>

      <div id="drinks" class="tabcontent">
        <table class="table table-borderless">
            <thead class="thead-dark">
               <tr><th scope="col">Name</th><th scope="col">Price</th><th scope="col">Takeout</th></tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                     $q = "SELECT item_name, item_price, take_out FROM menu WHERE item_category = 12;";
                     $result = $link->query($q);
                     while ($row = $result -> fetch_assoc()){
                        $itemname = $row['item_name'];
                        $itemprice = $row['item_price'];
                        $takeout = $row['take_out'];
                        echo '<td><a href="#">'.$itemname.'</a></td><td>'.$itemprice.'</td><td><span class="takeout">'.$takeout.'</span></td></tr>';
                     }
                  ?>
            </tbody>
         </table>
      </div>

    </div>
    </main>
    
<?php
include_once "./includes/footer.php";
?>
