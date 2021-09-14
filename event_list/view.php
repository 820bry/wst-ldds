<?php
require_once('../banner.php');

$eventID = $_GET['eventID'];
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

    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/wst-ldds/style/main.css">
    <link rel="stylesheet" href="/wst-ldds/style/view.css">
    <script src="/wst-ldds/scripts/event-data.js" type="text/javascript" defer></script>

    <title>Participant's List | LDDS</title>
    </head>
        <body class="hidden-scrollbar">

            <div class="view-box">

                <div class="arrow_back">
                    <span class="material-icons ">arrow_back</span>
                </div>

                <div class="move_search">
                    <input type="text" class="searchbar search_bar" id="searchbar" placeholder="Search Participants..." oninput="loadParticipants()">
                </div>

                <div class="view_participants">
                    <table class="list" id="participant-list">
                        <thead class="no_view">
                            <th>Participant Name</th>
                            <th>Student ID</th>
                            <th>Join Date & Time</th>
                            <th>Remove</th>
                        </thead>
                        <tbody>
    
                            <tr class="data-row">
                                <td>Badmintion</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td><span class="material-icons">delete</span></td>
                            </tr>
                            <tr class="data-row">
                                <td>Badmintion</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td><span class="material-icons">delete</span></td>
                            </tr>
                            <tr class="data-row">
                                <td>Badmintion</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td><span class="material-icons">delete</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </body>

        <script>
            var eventID = <?php echo $eventID ?>;
        </script>

    </html>