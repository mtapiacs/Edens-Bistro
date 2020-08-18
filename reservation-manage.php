<?php
require "./includes/dbConnect.php";
include_once "./includes/header.php";
?>
<main class="main-container">

<h2 align = "center">Admin Reservation View</h2><br>

<div class="container space-buttons">    
<!-- <div class = "reservation-container"> -->

    <form method = POST action = "search-res.php" class = "form-inline">
        <input class = "form-control mr-sm-2" placeholder = "Search Name" name = "res-search"/>
        <button class = "btn btn-primary-color" type = "submit" name = "submit">Search</button>
    </form> <br> 
    <a class = "btn btn-primary-color" href = "reservation_manage_calendar.php">Calendar View</a>
</div>    
    <?php
        $sql = "SELECT * FROM reservations ORDER BY reservation_id";
        $results = mysqli_query($conn,$sql);
        $result_amount = mysqli_num_rows($results);

        if($result_amount > 0){
            while($row = mysqli_fetch_assoc($results)){
                // echo $row['reservation_id'] . $row['name'];
                echo
                "<div reservation-results>
                            <table class = 'manage-res-table'>
                                <tr class = 'res-tr'>
                                    <th class = 'res-th'>ID:</th>
                                    <th class = 'res-th'>Name:</th>
                                    <th class = 'res-th'>Room:</th>
                                    <th class = 'res-th'>Guests:</th>
                                    <th class = 'res-th'>Time:</th>
                                    <th class = 'res-th'>Date:</th>
                                    <th class = 'res-th'>Phone Number:</th>
                                    <th class = 'res-th'>Comments:</th>

                                </tr>
                                <tr class = 'res-tr'>
                                    <td class = 'res-td'><p class = 'res-records'>".$row['reservation_id']."</p></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['name']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['room']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['num_people']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['reservation_time']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['reservation_date']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['phone_number']."</h5></td>
                                    <td class = 'res-td'><h5 class = 'res-records'>".$row['comments_questions']."</h5></td>
                                </tr>
                            </table>
                </div><br>";
            }

        }       ?>
</div>

</main>