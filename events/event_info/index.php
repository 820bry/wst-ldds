<?php
require_once('../../banner.php');
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
    <script src="/wst-ldds/scripts/carousel.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/events.js" type="text/javascript"></script>
    <title>Event Name | LDDS</title>
</head>


<body class="hidden-scrollbar">

    <div class="content">
        <h1>Event A</h1>
        <div class="event-info">
            <div class="person-in-charge">
                <img src="/wst-ldds/style/images/committee/CZ.JPG">
                <span>Lucy Yeow</span>
            </div>
            <div class="event-img">
                <!-- Could be carousel, tbd -->
                <img src="/wst-ldds/style/images/carousel/JLC.jpg">
                
            </div>
            <div class="event-details">
                <div class="desc">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="slots-left">
                    Slots Left: 69
                </div>
                <div class="deadline">
                    Deadline: 31/12/2021
                </div>
                <br>
                <input class="register" id="register" type="button" value="Join" />
            </div>
        </div>
    </div>

</body>

</html>