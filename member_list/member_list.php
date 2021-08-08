<?php
require_once('/wst-ldds/banner.php');
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
    <link rel="stylesheet" href="/style/main.css"/>

    <link rel="stylesheet" href="/style/member_list.css">
    <script src="/scripts/carousel.js" type="text/javascript"></script>
    <script src="/scripts/events.js" type="text/javascript"></script>
    <script src="/scripts/member_list.js" type="text/javascript" defer></script>
    <title>Events | LDDS</title>
</head>


<body>
    <div class = "member-container" id = "member-container">
        <div class="head_of_table">
            <h3 class="head_one">Members</h3>
                <input type="text" class="searchbar" id="searchbar" placeholder="Search">
            <div class = "close-button">
                <button class = "mdl-button mdl-js-button mdl-button--mini-fab mdl-js-ripple-effect"></button>
            </div>
        </div>
        <div class = "page-controls" id = "page-controls">
            <span><b>Page</b></span>
            <span class ="page-count" id = "page-count">1 - 1 of 1</span>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">cached</i></button>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">navigate_before</i></button>
            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"><i class="material-icons">navigate_next</i></button>
        </div>
        <div class="table_list">
            <table class="member_list" id = "member_list">
                <thead>
                    <th class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-0"><input type="checkbox" id="checkbox-0" class="mdl-checkbox__input" onclick="checkAllBox(this)"></label></th>
                    <th>Name <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Student ID <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Course <span class="material-icons">keyboard_arrow_down</span> </th>
                    <th>Email <span class="material-icons">keyboard_arrow_down</span> </th>
                </thead>

            <tbody>
                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1"><input type="checkbox" id="checkbox-1" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>DFT</td>
                    <td>abuabuabu@gmail.com</td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2"><input type="checkbox" id="checkbox-2" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>DFT</td>
                    <td>abuabuabu@gmail.com</td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-3"><input type="checkbox" id="checkbox-3" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>DFT</td>
                    <td>abuabuabu@gmail.com</td>
                </tr>

                <tr>
                    <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-4"><input type="checkbox" id="checkbox-4" class="mdl-checkbox__input"></label></td>
                    <td>Abu</td>
                    <td>00PMD00000</td>
                    <td>DFT</td>
                    <td>abuabuabu@gmail.com</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>



</body>

</html>