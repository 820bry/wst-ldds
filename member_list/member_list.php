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
                <input type="text" class="searchbar" id="searchbar" placeholder="Search">
            <span>
                <select id="choose_item" name="chooseitem" form="item">
                    <option value="name">Name</option>
                    <option value="student_id">Student ID</option>
                    <option value="faculty">Faculty</option>
                    <option value="course">Course</option>
                    <option value="nric">NRIC</option>
                    <option value="e-mail">Email</option>
                    <option value="phone_num">Phone Number</option>
                </select>
            </span>

            <div class = "close-button">
                <button class = "mdl-button mdl-js-button mdl-button--mini-fab mdl-js-ripple-effect"></button>
            </div>
        </div>
        <div class = "page-controls" id = "page-controls">
            <span><b>Page</b></span>
            <span class ="page-count" id = "page-count">1 - 1 of 1</span>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">cached</i></button>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">delete</i></button>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">navigate_before</i></button>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">navigate_next</i></button>
        </div>
        <div class="table_list">
            <table class="member_list" id = "member_list">
                <thead>
                    <th class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-0"><input type="checkbox" id="checkbox-0" class="mdl-checkbox__input" onclick="checkAllBox(this)"></label></th>
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
                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1"><input type="checkbox" id="checkbox-1" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>FOCS</td>
                    <td>DFT</td>
                    <td>000000-00-0000</td>
                    <td>abuabuabu@gmail.com</td>
                    <td>010-0000000</td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">edit</i></button></td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">delete</i></button></td>
                    <td>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
                    <input type="checkbox" id="switch-1" class="mdl-switch__input">
                    <span class="mdl-switch__label"></span></label>
                    </td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2"><input type="checkbox" id="checkbox-2" class="mdl-checkbox__input"></label></td>
                    <td>Buai</td>
                    <td>11PMD11111</td>
                    <td>FAFB</td>
                    <td>ABC</td>
                    <td>111111-11-1111</td>
                    <td>buaibuai@gmail.com</td>
                    <td>011-1111111</td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">edit</i></button></td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">delete</i></button></td>
                    <td>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
                    <input type="checkbox" id="switch-2" class="mdl-switch__input">
                    <span class="mdl-switch__label"></span></label>
                    </td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-3"><input type="checkbox" id="checkbox-3" class="mdl-checkbox__input"></label></td>
                    <td>Cally</td>
                    <td>22PMD22222</td>
                    <td>BCAB</td>
                    <td>DBA</td>
                    <td>222222-22-2222</td>
                    <td>cally@gmail.com</td>
                    <td>012-2222222</td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">edit</i></button></td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">delete</i></button></td>
                    <td>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-3">
                    <input type="checkbox" id="switch-3" class="mdl-switch__input">
                    <span class="mdl-switch__label"></span></label>
                    </td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-4"><input type="checkbox" id="checkbox-4" class="mdl-checkbox__input"></label></td>
                    <td>Erin</td>
                    <td>33PMD33333</td>
                    <td>FOCS</td>
                    <td>DIN</td>
                    <td>33333-33-3333</td>
                    <td>erin@gmail.com</td>
                    <td>013-3333333</td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">edit</i></button></td>
                    <td><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">delete</i></button></td>
                    <td>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-4">
                    <input type="checkbox" id="switch-4" class="mdl-switch__input">
                    <span class="mdl-switch__label"></span></label>
                    </td>
                </tr>
                
            </tbody>
            </table>
        </div>
    </div>



</body>

</html>