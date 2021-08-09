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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/wst-ldds/style/main.css"/>

    <link rel="stylesheet" href="/wst-ldds/style/member_list.css">
    <script src="/wst-ldds/scripts/events.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/member_list.js" type="text/javascript" defer></script>
    <title>Member List | LDDS</title>
</head>


<body>
    <div class = "member-container" id = "member-container">
        <div class="head_of_table">
            <h3 class="head_one">Members</h3>
                <input type="text" class="searchbar" id="searchbar" placeholder="Search" oninput="search(1)">
            
            <span class="select-custom">
                <select id="choose_item" name="chooseitem" form="item">
                    <option value="name">Name</option>
                    <option value="student_id">Student ID</option>
                    <option value="faculty">Faculty</option>
                    <option value="course">Course</option>
                    <option value="nric">NRIC</option>
                    <option value="email">Email</option>
                    <option value="phone_no">Phone Number</option>
                </select>
                    <span class="arrow_down"></span>
            </span>

            <div class = "close-button">
                <button class = "mdl-button mdl-js-button mdl-button--mini-fab mdl-js-ripple-effect"></button>
            </div>
        </div>
        <div class = "page-controls" id = "page-controls">
            <span><b>Page</b></span>
            <span class ="page-count" id = "page-count">1 of 1</span>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="refresh" onclick="search(1);"><i class="material-icons">cached</i></button>
            <div class="mdl-tooltip" for="refresh">Refresh</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="del-selected" onclick="deleteSelectedRow()"><i class="material-icons">delete</i></button>
            <div class="mdl-tooltip" for="del-selected">Delete Selected</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="prev" onclick="search(page-1)" disabled><i class="material-icons">navigate_before</i></button>
            <div class="mdl-tooltip" for="prev" id="prev-tooltip">Previous Page</div>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="next" onclick="search(page+1)"><i class="material-icons">navigate_next</i></button>
            <div class="mdl-tooltip" for="next" id="next-tooltip">Next Page</div>
        </div>
        <div class="table_list">
            <table class="member_list" id = "member_list">
                <thead>
                    <th class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-checkbox--accent" for="checkbox-0"><input type="checkbox" id="checkbox-0" class="mdl-checkbox__input" onclick="checkAllBox(this)"></label></th>
                    <th>Name <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Student ID <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Faculty <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Course <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>NRIC <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Email <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Phone Number <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Admin <span class="material-icons">keyboard_arrow_down</span></th>
                </thead>

            <tbody>
                <!-- HTML Code for row (Commented for template purpose) 
                    <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1"><input type="checkbox" id="checkbox-1" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>FOCS</td>
                    <td>DFT</td>
                    <td>000000-00-0000</td>
                    <td>abuabuabu@gmail.com</td>
                    <td>010-0000000</td>
                    <td>
                        <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit1"><i class="material-icons">edit</i></button>
                        <div class="mdl-tooltip" for="edit1">Edit</div>
                    </td>
                    <td>
                        <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="delete1" onclick="deleteRow(this)"><i class="material-icons">delete</i></button>
                        <div class="mdl-tooltip" for="delete1">Delete</div>
                    </td>
                    <td>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
                    <input type="checkbox" id="switch-1" class="mdl-switch__input">
                    <span class="mdl-switch__label"></span></label>
                    </td>
                </tr> -->                
            </tbody>
            </table>

        </div>
    </div>



</body>

</html>