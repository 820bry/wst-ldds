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
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <link  rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/wst-ldds/style/main.css">
    <link rel="stylesheet" href="/wst-ldds/style/view.css">

    <title>Edit Committee | LDDS</title>
    </head>
        <body class="hidden-scrollbar">

            <div class="comm_container" id="comm_container">

                <div class="head_of_table">
                <h3 class="head_one" >Committee Members</h3>

                <input type="text" class="searchbar" id="searchbar" placeholder="Search Committee members..." >
            </div>



                <table class="list" id = "comm_list">
                <thead>
                    <th>Committee name  </th>
                    <th>Position </th>
                    <th>Gender  </th>
                    <th>Student ID</th>
                    <th>Email</th>
                    <th>Edit</th>
                </thead>

            <tbody>
                <tr class="color_edit">
                    <td><input type="text" id="edit_invisible" class="edit_invisible" value="halo"  disabled></input></td>
                    <td><input type="text" id="edit_invisible" class="edit_invisible"  disabled></input></td>
                    <td class="edit_invisible"><input type="text" id="edit_invisible"  disabled></input></td>
                    <td class="edit_invisible"><input type="text" id="edit_invisible"  disabled></input></td>
                    <td><input type="text" id="edit_invisible" class="edit_invisible"  disabled></input></td>
                    <td>
                        <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}" onclick="editButton(this)"><i class="material-icons">edit</i></button>
                        <div class="mdl-tooltip" for="edit${no}">Edit</div>
                    </td>
                </tr>

            </tbody>
            </table>

            </div>

        </body>

    </html>