<?php

if(isset($_POST["search-form"])) {
   require "./includes/dbConnect.php";
   
   $searchTerm = $_POST["search-term"];
   
   //Check If Error Connecting to Database 
   if(mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }
   
   $query = "SELECT item_name, item_desc, item_price FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);";
   
   //Create Prepared Statement
   $stmt = mysqli_stmt_init($conn);
   if(mysqli_stmt_prepare($stmt, $query)) {
      //Bind input to parameters
      mysqli_stmt_bind_param($stmt, "s", $searchTerm);
      
      //Execute prepared Statement
      mysqli_stmt_execute($stmt);
      
      //Bind query results to variables
      mysqli_stmt_bind_result($stmt, $item_name, $item_desc, $item_price);
      
      //Store results in array
      $results = array();
      while(mysqli_stmt_fetch($stmt)) {
         $results[] = array("name" => $item_name, "description" => $item_desc, "price" => $item_price);
      }
      
      if($results <= 0) {
         echo "No results found :(";
         echo("Location: menu.php");
      }
      //Close prepared Statement
      mysqli_stmt_close($stmt);
   }
   
   require "./includes/dbDisconnect.php";

}
?>