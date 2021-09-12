<!DOCTYPE html>
<?php
    require_once('../banner.php');
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
        <h1>Your Event History</h1>
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
             <tr>
                 <td class="tabindex">1.</td>
                 <td class = "view-eventname" >Event A</td>
                 <td class = "view-eventdesc" >A Description</td>
                 <td class ="view-eventdate" >1.1.2021</td>
                 <td class ="view-eventtime" >10:00am - 5:00pm</td>
                 <td class ="view-eventvenue" >Main Foyer</td>
             </tr>
             </tbody>
            </table>
        </div>
    </div>     
        
    </body>
</html>
