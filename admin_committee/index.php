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

    <script src="/wst-ldds/scripts/admin_committee.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <link  rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/wst-ldds/style/main.css">
    <link rel="stylesheet" href="/wst-ldds/style/edit_comm.css">

    <title>Edit Committee | LDDS</title>
    </head>
        <body class="hidden-scrollbar">

            <div class="comm_container" id="comm_container">

                <div class="head_of_table">
                <h3 class="head_one" >Committee Members</h3>

                <input type="text" class="searchbar" id="searchbar" placeholder="Search Committee members..." oninput="search(this)">
            </div>



                <table class="list" id = "comm_list">
                <thead>
                    <th>Committee name  </th>
                    <th>Position </th>
                </thead>
            <tbody>
                <?php
                    require_once("../config/conn.php");

                    $query = $conn->prepare("SELECT * FROM committee;");
                    $query->execute();
                    $result = $query->get_result();

                    while($row = $result->fetch_assoc()) {
                        $memberQuery = $conn->prepare("SELECT * FROM member;");
                        $memberQuery->execute();
                        $memberResult = $memberQuery->get_result();



                        echo '
                        <tr class="color_edit">
                            <td><select onchange="update(this)">';
                        while ($memberRow = $memberResult -> fetch_assoc()) {
                            echo '<option value="'.$memberRow['student_id'].'"'.(($memberRow['student_id'] == $row['student_id']) ? 'selected': '').'>'.$memberRow['student_id'].' - '.$memberRow['name'].'</option>';
                        }
                        echo '</select></input>
                            </td>
                            <td>'.$row['position'].'</td>
                        </tr>';
                    }
                ?>
                

            </tbody>
            </table>

            </div>
            <div id="snackbar" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>

        </body>

    </html>