<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";
?>

<main class="main-container">
<!-- <h2 class="page-header">Reservation Calendar</h2> -->
<a href = "reservation.php" class="btn btn-sm">Back To Reservation</a>

<h2 align = "center">Reservation Calendar</h2>
    <br>

    <div class = "container">
        <div id = "calendar"></div>
    </div>
    <br>
<SCRIPT type = "text/javascript"> 
    $(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            editable:true, //allows you to edit events on calendar
            header:{ //different buttons for different options like month and week
                left:'prev,next today', //puts button on left
                center:'title', //title of calendar in center
                right:'month,agendaWeek,agendaDay',
            }, //buttons to display week day and month
            events:'calendar_load.php', //loads info from the load page
            //selectable:true, //allows click and drag
            //selectHelper: true, //placeholder for the event
        }); //calls the calendar method in the full calendar library 
    });

</SCRIPT>
    

<!-- </BODY>
</HTML> -->
</main>

<?php
include_once "./includes/footer.php";
?>