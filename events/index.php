<?php
require_once('../banner.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

        <link rel="stylesheet" href="/wst-ldds/style/main.css">
        <link rel="stylesheet" href="/wst-ldds/style/events.css">

        
        <script src="/wst-ldds/scripts/events.js" type="text/javascript"></script>
        <title>Events | LDDS</title>
    </head>


    <body>
        <div class="content">
            <h1>Events</h1>
            <input type="text" class ="event-searchbox" id="event-searchbox" placeholder="Search Event" > 
            <div class="events-list">
            <?php
                require_once("./../config/conn.php");

                $query = $conn->prepare("SELECT * FROM event;");
                $query->execute();
                $result = $query -> get_result();

                if ($result->num_rows > 0) {
                    //At least 1 row returned
                    while ($row = $result->fetch_assoc()) {
                        $query2 = $conn->prepare("SELECT COUNT(*) AS slots_taken FROM event_registration WHERE event_id=?");
                        $query2->bind_param("s", $row['id']);
                        $query2->execute();
                        $registrationResult = $query2->get_result();
                        $slotsTaken = $registrationResult->fetch_assoc()['slots_taken'];

                        echo '<a class="event-box" href="/wst-ldds/event/'.$row['id'].'">
                                <h3>'.$row['name'].'</h3>
                                <div class="desc">'.$row['description'].'</div>
                                <div class="deadline">Deadline: '.date("d F Y", strtotime($row['deadline'])).'</div>
                                <div class="slots-left">Slots Left: '.$row['capacity'] - $slotsTaken.'</div>
                            </a>';
                    }
                } else {
                   
                }
             ?>
                <!-- <a class="event-box" href="/wst-ldds/events/event_info/">
                    <h3>Event A</h3>
                    <div class="desc">A Short Description for Event A.</div>
                    <div class="deadline">Deadline: 31/12/2021</div>
                    <div class="slots-left">Slots Left: 69</div>
                </a>
                <a class="event-box" href="/wst-ldds/events/event_info/">
                    <h3>Event B</h3>
                    <div class="desc">A Short Description for Event B.</div>
                    <div class="deadline">Deadline: 31/12/2021</div>
                    <div class="slots-left">Slots Left: 69</div>
                </a>
                <a class="event-box" href="/wst-ldds/events/event_info/">
                    <h3>Event C</h3>
                    <div class="desc">A Short Description for Event C.</div>
                    <div class="deadline">Deadline: 31/12/2021</div>
                    <div class="slots-left">Slots Left: 69</div>
                </a>
                <a class="event-box" href="/wst-ldds/events/event_info/">
                    <h3>Event D</h3>
                    <div class="desc">A Short Description for Event D.</div>
                    <div class="deadline">Deadline: 31/12/2021</div>
                    <div class="slots-left">Slots Left: 69</div>
                </a> -->
            </div>
        </div>  
    </body>

</html>