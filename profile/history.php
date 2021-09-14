<!DOCTYPE html>
<?php
    require_once('../banner.php');

    if (!isset($_SESSION['permission_level'])) {
        //permission_level not set, assume didn't log in at all
        header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/home");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['studentID']) && $_SESSION['permission_level'] == 1) {
            //studentID is set and person is admin, allow to see other's event history
            $searchValue = $_GET['studentID'];
        } else {
            //id not set or permission level not enough, display own event history
            $searchValue = $_SESSION['student_id'];
        }
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/history.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/profile.js" type="text/javascript"></script>
    <link  rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/wst-ldds/style/main.css">
    <link rel="stylesheet" href="/wst-ldds/style/profile.css">

    <title>My History| LDDS</title>
</head>
    <body class = "view-history">
        <body class="hidden-scrollbar">

    <div class="content">
        <h1><?php echo ($searchValue == $_SESSION['student_id']) ? "Your" : $searchValue."'s"; ?> Event History</h1>
            <?php 
                if ($_SESSION['permission_level'] == 1) {
                    echo '<span class="event-label">Find User</span>
                    <input type="text" class="event-findmember" id="event-findmember" placeholder="Enter Student ID">';
                }
            ?>
            <span class="event-label">Search Events</span>
            <input type="text" class="event-searchbar" id="event-searchbar" placeholder="Search Event" oninput="search(this)">
        <div class="user-history">
            <table class = "view-event" id="event-table">
            <thead>
             <tr>
                 <th class="tabindex"> </th>
                 <th class="view-eventname">
                     Event Name
                 </th>
                 <th class ="view-eventdesc">
                     Description
                 </th>
                 <th class = "view-eventdate">
                     Date
                 </th>
                 <th class="view-eventtime">
                     Time
                 </th>
                 <th class ="view-eventvenue">
                     Venue
                 </th>
             </tr>
             </thead>
             <tbody>
             <?php
                require_once("./../config/conn.php");

                $query = $conn->prepare("SELECT * FROM event_registration INNER JOIN event ON event_registration.event_id=event.id WHERE student_id=?");
                $query->bind_param("s", $searchValue);
                $query->execute();
                $result = $query -> get_result();

                if ($result->num_rows > 0) {
                    //At least 1 row returned
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td class="tabindex">'.$count.'</td>
                                <td class = "view-eventname" ><a href="/wst-ldds/event/'.$row['event_id'].'">'.$row['name'].'</a></td>
                                <td class = "view-eventdesc" >'.$row['description'].'</td>
                                <td class ="view-eventdate" >'.date('d F Y', strtotime($row['date'])).'</td>
                                <td class ="view-eventtime" >'.date('h:ia', strtotime($row['start_time'])).' - '.date('h:ia', strtotime($row['end_time'])).'</td>
                                <td class ="view-eventvenue" >'.$row['venue'].'</td>
                            </tr>';
                        $count++;
                    }
                } else {
                    //Check if user exists
                    $query2 = $conn->prepare("SELECT * FROM ${db_member} WHERE student_id=?");
                    $query2->bind_param("s", $searchValue);
                    $query2->execute();
                    $result2 = $query2 -> get_result();
                    if ($result2->num_rows == 0) {
                        echo '<tr><td style="text-align: center;" colspan="6"> User does not exists </td></tr>';
                    } else {
                        echo '<tr><td style="text-align: center;" colspan="6"> No event joined </td></tr>';
                    }
                }
             ?>
             <!-- <tr>
                 <td class="tabindex">1.</td>
                 <td class = "view-eventname" >Event A</td>
                 <td class = "view-eventdesc" >A Description</td>
                 <td class ="view-eventdate" >1.1.2021</td>
                 <td class ="view-eventtime" >10:00am - 5:00pm</td>
                 <td class ="view-eventvenue" >Main Foyer</td>
             </tr> -->
             </tbody>
            </table>
        </div>
    </div>     
        
    </body>
</html>
