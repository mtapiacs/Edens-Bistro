<link rel="stylesheet" href="./css/main.css" />

<?php
include_once "./includes/header.php";
?>

<?php
require "./includes/dbConnect.php";
?>

<main class="main-container">
<h1>Events matching your search:</h1>
<div>
    <?php
    //Used bootstrap for the card CSS
        if(isset($_POST['submit-search'])) {
            
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //Queries the DB to find the event searched for and it associated information
            $sql = "SELECT * FROM events WHERE MATCH(event_name, event_desc) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                echo "There are ".$queryResult." results.";
                ?> <a href = "events.php">Return to Events</a> <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo 
                    "<div class='card' style='width: 18rem;' >
                        <div class='card-body'>
                            <h5 class='card-title'>".$row['event_name']."</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>".$row['event_start_date']."</h6>
                                    <p class='card-text'>".$row['event_desc']."</p>
                                        Starts:
                                    <p>".$row['event_start_date']."</p>
                                        At:
                                    <p>".$row['event_time']."</p>
                                        Ends:
                                    <p>".$row['event_end_date']."</p>
                        </div>
                    </div>";
                }
            } else {
                echo "There are no results matching your search.";
            }
        }
    ?>
    </br>
</div>
</main>

<?php
  include_once "./includes/dbDisconnect.php";
?>