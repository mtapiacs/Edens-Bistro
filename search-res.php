<?php
require "./includes/dbConnect.php";
include_once "./includes/header.php";
?>
<main class = "main-container">
<a class = "btn btn-primary-color" href = "reservation-manage.php" style = "text-align: right">New Search</a>
    <br> <br>
    <div class = "resultscontainer">
        <?php
            if(isset($_POST['submit'])){
                $Search = mysqli_real_escape_string($conn, $_POST['res-search']); //when user types something there is no sql injection
                //use search query to read what was written and compares to database
                $sql = "SELECT * FROM reservations WHERE name LIKE '%$Search%' OR email LIKE '%$Search%' OR reservation_date LIKE '%$Search%' or phone_number LIKE '%$Search%'";
                $Results = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($Results); //gets results

                echo("There are ".$queryResults." results:"); //counts number of records in the database
                //if there are records in the DB
                if($queryResults > 0){
                    while($row = mysqli_fetch_assoc($Results)){ //have the search results go to profile
                        echo
                        "<div reservation-results>
                                    <table class = 'manage-res-table'>
                                        <tr class = 'res-tr'>
                                            <th class = 'res-th'>ID:</th>
                                            <th class = 'res-th'>Name:</th>
                                            <th class = 'res-th'>Room:</th>
                                            <th class = 'res-th'>Guests:</th>
                                            <th class = 'res-th'>Start Event:</th>
                                            <th class = 'res-th'>End Event:</th>
                                            <th class = 'res-th'>Phone Number:</th>
                                            <th class = 'res-th'>Comments:</th>
        
                                        </tr>
                                        <tr class = 'res-tr'>
                                            <td class = 'res-td'><p class = 'res-records'>".$row['reservation_id']."</p></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['name']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['room']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['num_people']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['start_event']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['end_event']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['phone_number']."</h5></td>
                                            <td class = 'res-td'><h5 class = 'res-records'>".$row['comments_questions']."</h5></td>
                                        </tr>
                                    </table>
                        </div>";
                    }
                }
                else{
                    echo "No Results Found";
                }
            }
            
        ?>
    </div>
</div>
</main>