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
    <link rel="stylesheet" href="/wst-ldds/style/profile.css">

    <title>My Profile | LDDS</title>
</head>
<body class="hidden-scrollbar">

    <div class="content">
        <h1>Your Profile</h1>
        <div class="profile">
        <span class="material-icons-outlined">edit</span>
            <div class="heading">
                <img src="/wst-ldds/style/images/committee/CZ.JPG">
                <div class="heading-info">
                    <table>
                        <tr>
                            <td class="value"><input type="text" class="user_info" id="user_info"></td>
                        </tr>
                        <tr>
                            <td class="value"><input type="text" class="user_info" id=“user_info></td>
                        </tr>
                    </table>
                    <!-- <h3>YEOW CHEN ZHENG</h3>
                    <h5>20PMD01234</h5> -->
                </div>
            </div>
            <div class="information">
                <table>
                    <tr>
                        <td class="data">Gender</td>
                        <td class="value"><input type="text" class="user_info" id="user_info"></td>
                    </tr>
                    <tr>
                        <td class="data">NRIC No.</td>
                        <td class="value"><input type="text" class="user_info" id="user_info"></td>
                    </tr>
                    <tr>
                        <td class="data">Email</td>
                        <td class="value"><input type="text" class="user_info" id="user_info"></td>
                    </tr>
                    <tr>
                        <td class="data">Programme</td>
                        <td class="value"><input type="text" class="user_info" id="user_info"></td>
                    </tr>
                    <tr>
                        <td class="data">Faculty</td>
                        <td class="value"><input type="text" class="user_info" id="user_info"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>