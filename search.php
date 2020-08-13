<link rel="stylesheet" href="./css/main.css" />

<?php
require "./includes/dbConnect.php";
?>


<h1>Events matching your search:</h1>
<div>
    <?php
    
        if(isset($_POST['submit-search'])) {
            
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            //echo $search;
            $sql = "SELECT * FROM events WHERE MATCH(event_name, event_desc) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
            //echo $sql;
            $result = mysqli_query($conn, $sql);
            echo $conn -> error;
            echo $result;
            $queryResult = mysqli_num_rows($result);
            echo $queryResult;

            if ($queryResult > 0) {
                echo "There are ".$queryResult." results!";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div>
                    <h3>".$row['event_name']."</h3>
                    <p>".$row['event_desc']."</p>
                  </div>";
                }
            } else {
                echo "There are no results matching your search.";
            }
        }
    ?>
</div>