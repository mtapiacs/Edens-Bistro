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
      
      /*testing some php */
         <?php
            $q = "SELECT item_name, item_price, categories.category_desc FROM menu INNER JOIN categories on menu.category_id = categories.item_category;";
            $result = $link->query($q);
            $results = mysqli_num_rows($result);
            if($results > 0) {
               while($row = $result->fetch_assoc()){
                  echo "<p>".$row['categories.category_desc']."</p>";
                  echo "<ul><li>".$row['item_name']." ".$row['item_price']."</li>";
                  echo "</ul>";
               } 
            }
         ?>
      <div class="tabcontent" id="breakfast">
        <h4>Weekday Breakfast, Served All-Day On Weekends</h4>
        <p class="takeout"> * available for takeout</p>
        <ul>
        
          <li><a href="#">Fruit Bowl <span class="takeout">*</span><span class="price">$4.99</span></a></li>
          <li><a href="#">Fruit Yogurt Blend <span class="takeout">* </span><span class="price">$5.29</span></a></li>
          <li><a href="#">Egg, Sausage, Biscuit Sandwich <span class="takeout">*</span><span class="price">$4.79</span></a></li>
          <li><a href="#">Egg, Sausage, Biscuit Sanwich Plus Cheese <span class="takeout">*</span><span class="price">$5.29</span></a></li>
          <li><a href="#">Buttermilk Pancakes, 2 Stacks <span class="price">$6.99</span></a></li>
          <li><a href="#">Buttermilk Pancakes, 3 Stacks <span class="price">$7.99</span></a></li>
          <li><a href="#">Belgian Waffles, 1 Stack <span class="price">$6.49</span></a></li>
          <li><a href="#">Belgian Waffles, 2 Stack <span class="price">$7.49</span></a></li>
        </ul>
        <p style="font-size:0.8em"><br>Add fruit, 1/4 cup, to panackes or waffles for $0.79 <br>
          Add fruit, 1/2 cup, to pancakes or waffles for $1.49 </p>
      </div>

      <div id="lunch" class="tabcontent">
        <h4>Served through 3 PM</h4>
        <p>* all lunches come with one side</p>
        <p class="takeout">* available for takeout</p>
        <ul>
          <li><a href="#">Fish Sandwich <span class="takeout">*</span><span class="price">$5.99</span></a></li>
          <li><a href="#">Fried Fish Platter <span class="price">$8.99</span></a></li>
          <li><a href="#">Summer Salad <span class="price">$7.99</span></a></li>
          <li><a href="#">1/2 Summer Salad <span class="takeout">*</span><span class="price">$4.99</span></a></li>
          <li><a href="#">Grilled Chicken Wrap <span class="takeout"></span><span class="price">$6.49</span></a></li>
          <li><a href="#">Grilled Chicken Salad <span class="price">$8.49</span></a></li>
          <li><a href="#">1/2 Grilled Chicken Salad <span class="price">$5.49</span></a></li>
          <li><a href="#">Hamburger <span class="takeout">*</span><span class="price">$6.29</span></a></li>
          <li><a href="#">Cheeseburger <span class="takeout">*</span><span class="price">$6.79</span></a></li>
          <li><a href="#">Frankfurter <span class="takeout">*</span><span class="price">$4.49</span></a></li>
          <li><a href="#">Italian Sausage W/ Peppers & Onions <span class="takeout">*</span><span class="price">$6.99</span></a></li>
          <li><a href="#">Chili Bowl <span class="price">$5.99</span></a></li>
        </ul>
      </div>

      <div id="dinner" class="tabcontent">
        <h4>Starts at 3 PM and Served All-Day on Sundays</h4>
        <p>* dinners come with two sides</p>
        <p class="takeout">* available for takeout</p>
        <ul>
          <li><a href="#">Fried Fish Platter<span class="price">$10.99</span></a></li>
          <li><a href="#">5 Greens Mega-Salad-Bowl<span class="price">$9.99</span></a></li>
          <li><a href="#">Personal Pot Pie<span class="price">$9.49</span></a></li>
          <li><a href="#">Deep Dish Pizza<span class="takeout">*</span><span class="price">$11.49</span></a></li>
          <li><a href="#">Grilled Salmon<span class="price">$12.99</span></a></li>
          <li><a href="#">Chicken Cordon Bleu<span class="price">$12.99</span></a></li>
          <li><a href="#">Buffalo Wings (6 Pieces)<span class="takeout">*</span><span class="price">$6.99</span></a></li>
          <li><a href="#">Buffalo Wings (9 Pieces)<span class="takeout">*</span><span class="price">$8.99</span></a></li>
          <li><a href="#">Buffalo Wings (12 Pieces)<span class="takeout">*</span><span class="price">$10.99</span></a></li>
          <li><a href="#">Okonomiyaki (Japanese Dinner Flatcake)<span class="price">$11.99</span></a></li>
          <li><a href="#">King Crab Legs<span class="price">$12.99</span></a></li>
        </ul>
      </div>

      <div id="sides" class="tabcontent">
        <p class="takeout">* all sides are available for takeout</p>
        <ul>
          <li><a href="#">Garden Salad<span class="price">$3.99</span></a></li>
          <li><a href="#">Caesar Salad<span class="price">$3.99</span></a></li>
          <li><a href="#">Regular Fries<span class="price">$1.99</span></a></li>
          <li><a href="#">Curly Fries<span class="price">$2.79</span></a></li>
          <li><a href="#">Sweet Potato Fries<span class="price">$2.79</span></a></li>
          <li><a href="#">White Rice<span class="price">$1.99</span></a></li>
          <li><a href="#">Boiled Cabbage<span class="price">$1.29</span></a></li>
          <li><a href="#">Steamed Mixed Vegetables<span class="price">$2.09</span></a></li>
        </ul>
      </div>

      <div id="desserts" class="tabcontent">
        <p class="takeout">* all desserts are available for takeout</p>
        <ul>
          <li><a href="#">Ice-Cream (Dish/Cone)<span class="price">$2.99</span></a></li>
          <li><a href="#">Flavored Frozen Ice<span class="price"></span></a></li>
          <li><a href="#">Large Chocolate Chip Cookie<span class="price"></span></a></li>
          <li><a href="#">Apple Pie<span class="price">$3.49</span></a></li>
          <li><a href="#">Lava Cake<span class="price">$8.49</span></a></li>
        </ul>
      </div>

      <div id="drinks" class="tabcontent">
        <p class="takeout"> * all drinks are available for takeout</p>
        <ul>
          <li><a href="#">Coffee, Tea<span class="price">$1.49</span></a></li>
          <li><a href="#">Hot Chocolate<span class="price">$1.89</span></a></li>
          <li><a href="#">White Hot Chocolate<span class="price">$2.19</span></a></li>
          <li><a href="#">Bottled Water<span class="price">$1.69</span></a></li>
          <li><a href="#">Regular Soda<span class="price">$1.99</span></a></li>
          <li><a href="#">Specialty Soda<span class="price">$2.79</span></a></li>
          <li><a href="#">Fruit Juice<span class="price">$2.39</span></a></li>
        </ul>
      </div>

    </div>
    </main>
    
<?php
include_once "./includes/footer.php";
?>
