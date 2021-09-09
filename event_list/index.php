<?php
require_once('../banner.php');

require_once('./../config/session.php');

if(isset($_SESSION['permission_level']))
{
    if($_SESSION['permission_level'] != 1)
    {
        http_response_code(302);
        header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/error");
        exit;
    }
} else {
    http_response_code(302);
    header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/error");
    exit;
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/wst-ldds/style/main.css"/>

    <link rel="stylesheet" href="/wst-ldds/style/list.css">
    <script src="/wst-ldds/scripts/event_list.js" type="text/javascript" defer></script>
    <title>Event List | LDDS</title>
</head>


<body>
    <div class = "member-container" id = "member-container">
        <div class="head_of_table">
            <h3 class="head_one">Events</h3>
            <input type="text" class="searchbar" id="searchbar" placeholder="Search">
        </div>

        <div class = "page-controls" id = "page-controls">
            <span class="select-custom">
                <select id="choose_item" name="chooseitem" form="item">
                    <option value="name">Event Name</option>
                    <option value="person_in_charge">Person In-Charge</option>
                    <option value="date">Date</option>
                    <option value="start_time">Start Time</option>
                    <option value="end_time">End Time</option>
                    <option value="venue">Venue</option>
                    <option value="capacity">Capacity</option>
                    <option value="deadline">Register Deadline</option>
                </select>
                <span class="arrow_down"></span>
            </span>
            <span><b>Page</b></span>
            <span class ="page-count" id = "page-count">1 - 1 of 1</span>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="add"><i class="material-icons">add</i></button>
            <div class="mdl-tooltip" for="add">Add Event</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="refresh"><i class="material-icons">cached</i></button>
            <div class="mdl-tooltip" for="refresh">Refresh</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="del-selected" onclick="deleteSelectedRow()"><i class="material-icons">delete</i></button>
            <div class="mdl-tooltip" for="del-selected">Delete Selected</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="prev"><i class="material-icons">navigate_before</i></button>
            <div class="mdl-tooltip" for="prev">Previous Page</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="next"><i class="material-icons">navigate_next</i></button>
            <div class="mdl-tooltip" for="next">Next Page</div>
        </div>
        <div class="table_list">
            <table class="list" id = "event_list">
                <thead>
                    <th class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-checkbox--accent" for="checkbox-0"><input type="checkbox" id="checkbox-0" class="mdl-checkbox__input" onclick="checkAllBox(this)"></label></th>
                    <th>Event Name <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Person In-Charge <span class="material-icons">keyboard_arrow_down</span></th>
                    <th>Date <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Start Time <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>End Time <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Venue <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Capacity <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Register Deadline <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

            <tbody>
                
                
            </tbody>
            </table>

        </div>
    </div>



</body>

</html>