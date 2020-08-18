<?php
include_once "./includes/header.php";
require "./includes/dbConnect.php";
?>

<main class="main-container">
<!-- <h2 class="page-header">Reservation Calendar</h2> -->
<a href = "reservation-manage.php" class="btn btn-sm">Back To Reservation</a>

<h2 align = "center">Admin Reservation Calendar</h2>
    <br>

    <div class = "container">
        <div id = "calendar"></div>
    </div>
    <br>
<SCRIPT type = "text/javascript"> 
    $(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            //editable:true, //allows you to edit events on calendar
            header:{ //different buttons for different options like month and week
                left:'prev,next today', //puts button on left
                center:'title', //title of calendar in center
                right:'month,agendaWeek,agendaDay',
            }, //buttons to display week day and month
            events:'./includes/calendar_load.php', //loads info from the load page
            selectable:true, //allows click and drag
            selectHelper: true, //placeholder for the event
            //inserted different actions
            // select: function(start,end,allDay){
            //     var title = prompt("Enter Event Title"); //prompt appears
            //     if(title){ //when a title is submitted
            //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD:mm:ss"); //start date
            //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD:mm:ss"); //end date
            //         $.ajax({ //ajax updates the page with out refreshing
            //             url:"insert.php", //insert the file
            //             type:"POST", //with a post method
            //             data:{title:title, start:start, end:end,test:test}, ///contains data within the prompt..variable names for post method
            //             success:function(){ //when the process is successful
            //                 calendar.fullCalendar('refetchEvents'); //refresh calendar
            //                 alert("Event Added Successfully");
            //             }
            //         })
            //     }
            // },
            editable: true,
            // eventResize:function(event){ //function that updates the event when resized
            //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD:mm:ss");//start
            //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD:mm:ss"); //end date
            //     var title = event.title; //title
            //     var id = event.id; //event id
            //     $.ajax({
            //         url:"update.php", //points to the update file
            //         type:"POST", //with a POST method
            //         data:{title:title,start:start, end:end,id:id}, //items used for post
            //         success:function(){ //when update is successful
            //             calendar.fullCalendar('refetchEvents');
            //             alert('Event Updated');
            //         }
            //     })
            // },
            // //changes and updates when dragged to date.
            eventDrop:function(event){
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss"); //get the start data of event
                var end = $.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss"); //get the end data of the event
                var title = event.title; //gets the title of the event
                var id = event.id; //gets the id
                $.ajax({
                    url:"update.php", //calls the update php file
                    type:"POST", //post method
                    data:{title:event.title,start:start, end:end,id:event.id}, //takes the data from the event and completes it in the update file
                    success:function(){
                      calendar.fullCalendar('refetchEvents');//refreshes the page with updated content
                      alert("Event Updated");
                    }
                });
            },
            eventClick:function(event){
                if(confirm("You sure you want to remove")){
                    var id = event.id;
                    $.ajax({
                        url:"delete.php",
                        type:"POST",
                        data:{id:id},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            alert("Event deleted");
                        }
                    })
                }
            },
            
            //////
            eventTextColor: 'White', //#034c3c
            eventColor: "#034c3c",
            allDay:false,
        }); //calls the calendar method in the full calendar library 
    });

</SCRIPT>
</main>

<?php
include_once "./includes/footer.php";
?>