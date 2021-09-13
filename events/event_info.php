<?php
require_once('../banner.php');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['eventID'])) {
        require_once("./../config/conn.php");

        $query = $conn->prepare("SELECT * FROM event WHERE id=?");
        $query->bind_param("s", $_GET['eventID']);
        $query->execute();
        $result = $query -> get_result();

        if ($result->num_rows == 1) {
            //1 row returned
            $eventInfo = $result->fetch_assoc();

            //Get slots taken
            $query2 = $conn->prepare("SELECT COUNT(*) AS slots_taken FROM event_registration WHERE event_id=?");
            $query2->bind_param("s", $eventInfo['id']);
            $query2->execute();
            $registrationResult = $query2->get_result();
            $slotsTaken = $registrationResult->fetch_assoc()['slots_taken'];

            //Check if user joined the event or not
            $query3 = $conn->prepare("SELECT COUNT(*) AS registration_no FROM event_registration WHERE event_id=? AND student_id=?");
            $query3->bind_param("ss", $eventInfo['id'], $_SESSION['student_id']);
            $query3->execute();
            $studentRegistrationResult = $query3->get_result();
            $eventJoined = ($studentRegistrationResult->fetch_assoc()['registration_no'] == 1) ? true: false;

            //Get PIC info
            $query4 = $conn->prepare("SELECT * FROM member WHERE student_id=?");
            $query4->bind_param("s", $eventInfo['person_in_charge']);
            $query4->execute();
            $PIC_Result = $query4 -> get_result();
            $PIC_Info = $PIC_Result->fetch_assoc();
        }
           
    }
}
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
    <title><?php echo $eventInfo['name'];?> | LDDS</title>
</head>


<body class="hidden-scrollbar">

    <div class="content info-content">
        <h1><?php echo $eventInfo['name'];?></h1>
        <div class="event-info">
            <div class="person-in-charge">
                <img src="/wst-ldds/profile/images/<?php echo isset($PIC_Info['img_path']) ? $PIC_Info['img_path'] : "default.png"; ?>">
                <span> <?php echo $PIC_Info['name']; ?> </span>
            </div>
            <div class="event-img">
                <!-- Could be carousel, tbd -->
                <img src="/wst-ldds/style/images/carousel/JLC.jpg">
                
            </div>
            <div class="event-details">
                <div class="desc">
                    <?php echo $eventInfo['description'];?> 
                </div>
                <div class="slots-left">
                    Slots Left: <?php echo $eventInfo['capacity']-$slotsTaken;?>
                </div>
                <div class="deadline">
                    Deadline: <?php echo date("d F Y", strtotime($eventInfo['deadline']));?> 
                </div>
                <div class="join-btn">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="join-btn" <?php echo ($eventJoined) ? "disabled": "";?>>
                        <?php echo ($eventJoined) ? "Joined": " Join Event";?>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="join-success-msg" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>

    <!-- MDL Snackbar -->
    <script>
    (function() {
    'use strict';
    var snackbarContainer = document.querySelector('#join-success-msg');
    var showToastButton = document.querySelector('#join-btn');
    showToastButton.addEventListener('click', function(e) {
        var buttonElement = showToastButton;

        <?php 
            //If user not logged in
            if (!isset($_SESSION['permission_level'])) {
                echo "window.location.href='/wst-ldds/login/';\nreturn;";
            }
        ?>

        fetch("/wst-ldds/events/event_join.php?eventID=<?php echo $_GET['eventID']?>")
        .then(response => response.text())
        .then(response => {
            if (response === "Success") {
                buttonElement.disabled = true;
                buttonElement.innerHTML = "Joined";
                'use strict';
                var data = {message: 'You have successfully joined this event!'};
                snackbarContainer.MaterialSnackbar.showSnackbar(data);
            } else {
                buttonElement.disabled = false;
                'use strict';
                var data = {message: response}; //'Fail to join this event, please try again later!'
                snackbarContainer.MaterialSnackbar.showSnackbar(data);
            }
        })

       
    });
    }());
    </script>
</body>

</html>