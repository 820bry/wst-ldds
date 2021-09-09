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
            
        <span>

            <button class="edit_profile"><i class="material-icons">edit</i></button>
        
        </span>
        
        <div class="heading">
            <img class="photo_" src="/wst-ldds/style/images/committee/CZ.JPG">

                <div class="heading-info">

                        <table>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" id="user_info" value="Yeow Chen Zheng" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" id=“user_info value="20PMD02740" disabled>
                                </td>
                            </tr>
                        </table>


                <form class="choose_photo" action="#">
                    <input type="file" id="pfp" >
                </form>
                    <!-- <h3>YEOW CHEN ZHENG</h3>
                    <h5>20PMD01234</h5> -->
                </div>
            </div>
            <div class="information">
                <table>
                    <tr>
                        <td class="data">Gender :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="Male" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">NRIC No :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Email :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Programme :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Faculty :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" disabled></td>
                    </tr>
                </table>
            </div>

            <div class="button_info">
                <div class="delete_button" id="delete_button">
                    <input type="button" value="Delete">
                </div>
                <div class="reset_button" id="reset_button">
                    <input type="reset" value="Back">
                </div>
                <div class="submit_button" id="submit_button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>
    </div>

</body>

</html>