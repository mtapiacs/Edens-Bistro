<?php

if(isset($_POST["search-form"])) {
   
   $searchTerm = $_POST["search-term"];
   
   require "./includes/dbConnect.php";

   //Create Prepared Statement
   $stmt = mysqli_stmt_init($conn);
   $query = "SELECT item_name, item_desc, item_price FROM menu WHERE MATCH(item_name, item_desc) AGAINST (? IN NATURAL LANGUAGE MODE);";
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
      
      //Close prepared Statement
      mysqli_stmt_close($stmt);
   }
   
   require "./includes/dbDisconnect.php";

}
?>