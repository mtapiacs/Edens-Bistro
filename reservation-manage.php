<?php
require "./includes/dbConnect.php";
include_once "./includes/header.php";
?>
<main class="main-container">
    
<div class = "reservation-container">

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
                </div>";
            }
        }


    ?>
</div>

</main>