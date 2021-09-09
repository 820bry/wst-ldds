<?php
require_once('../banner.php');
require("./../config/session.php");
require("./../config/conn.php");

if (isset($_POST['submit'])) {
    //Submit button is pressed
    $name = $_POST['name'];

    $query = $conn->prepare("UPDATE ${db_member} SET name=?, ic_no=?, email=?, phone_no=?, faculty=?, course_code=? WHERE student_id=?");
    $query -> bind_param("sssssss", $name, $icNo, $email, $phoneNumber, $faculty, $courseCode, $originalID);
    $query -> execute();
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
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/profile.js" type="text/javascript"></script>
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

            <button class="edit_profile"><i class="material-icons" onclick="toggleEdit()">edit</i></button>
        
        </span>
        
        <form action="#" method="post">
        <div class="heading">
            <img class="photo_" src="/wst-ldds/style/images/committee/CZ.JPG">

                <div class="heading-info">

                        <table>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" id="user_info" name="name" value="<?php echo $_SESSION['name'];?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" name="studentID" value="<?php echo $_SESSION['student_id'];?>" disabled>
                                </td>
                            </tr>
                        </table>


                
                    <input type="file" id="pfp" >
                
                    <!-- <h3>YEOW CHEN ZHENG</h3>
                    <h5>20PMD01234</h5> -->
                </div>
            </div>
            <div class="information">
                <table>
                    <tr>
                        <td class="data">Phone No :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="<?php echo $_SESSION['phone_no'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">NRIC No :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="<?php echo $_SESSION['ic_no'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Email :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="<?php echo $_SESSION['email'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Programme :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="<?php echo $_SESSION['course_code'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Faculty :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" value="<?php echo $_SESSION['faculty'];?>" disabled></td>
                    </tr>
                </table>
            </div>

            <div class="button_info" id="button_info">
                <div class="delete_button" id="delete_button">
                    <input type="button" value="Delete">
                </div>
                <div class="reset_button" id="reset_button">
                    <input type="reset" value="Reset">
                </div>
                <div class="submit_button" id="submit_button">
                    <input type="submit" value="Submit">
                </div>
            </div>

        </div>
        </form>
    </div>

</body>

</html>