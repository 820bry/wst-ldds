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
                <select class="sort-by-select" id="choose_item" name="chooseitem" form="item">
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
                    <th>Show Participants</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

            <tbody>
                
                
            </tbody>
            </table>

        </div>
    </div>
    <dialog class="mdl-dialog new-event-dialog new-event-dialog">
        <h4 class="mdl-dialog__title">New Event</h4>
        <div class="mdl-dialog__content">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="new_name" id="new_name">
                <label class="mdl-textfield__label" for="new_name">Event Name</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="new_venue" id="new_venue">
                <label class="mdl-textfield__label" for="new_venue">Venue</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <textarea class="mdl-textfield__input" type="text" rows= "3" name="new_desc" id="new_desc" ></textarea>
                <label class="mdl-textfield__label" for="new_desc">Event Description</label>
            </div>

            <div class="capacity-slider">
                <label for="new_capacity">Capacity</label>
                <input class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="0" tabindex="0" name="new_capacity" id="new_capacity">
                <p id="curr-capacity">0</p>
            </div>

            <label for="new_date">Date of Event</label>
            <input type="date" name="new_date" id="new_date" />
            <label for="new_start_time">Start Time</label>
            <input type="time" name="new_start_time" id="new_start_time" />
            <label for="new_end_time">End Time</label>
            <input type="time" name="new_end_time" id="new_end_time" />
            <label for="new_deadline">Registration Deadline</label>
            <input type="date" name="new_deadline" id="new_deadline" />

            <select class="select-pic" name="new_pic" id="new_pic">
                <option disabled selected>Person-in-charge</option>
                <option value="test">Name</option>
            </select>
            
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Discard</button>
            <button type="button" class="mdl-button">Add</button>
        </div>
    </dialog>
    <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#add');
        if(!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
            dialog.close();
        });

        var slider = document.getElementById('new_capacity');
        var label = document.getElementById('curr-capacity');
        slider.oninput = function() {
            label.innerHTML = slider.value;
        }
    </script>
</body>

</html>