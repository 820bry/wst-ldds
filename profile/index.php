<?php
@require("./../config/session.php");
require("./../config/conn.php");

if (isset($_POST['submit'])) {
    //Submit button is pressed
    $name = $_POST['name'];
    $studentID = $_POST['studentID'];
    $icNo = $_POST['icNo'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNo'];
    $faculty = $_POST['faculty'];
    $courseCode = $_POST['courseCode'];

    //File upload
    $imagePath = $_FILES['file']['name'];
    $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
    $filepath = "images/${studentID}.${ext}";
    $imageName = $studentID.".".$ext;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        //Do nothing if success
    } else {
        echo "test";
    }

    $query = $conn->prepare("UPDATE ${db_member} SET name=?, img_path=?, ic_no=?, email=?, phone_no=?, faculty=?, course_code=? WHERE student_id=?");
    $query -> bind_param("ssssssss", $name, $imageName, $icNo, $email, $phoneNumber, $faculty, $courseCode, $studentID);
    $query -> execute();
    
    if ($query) {
        //Success
        $_SESSION['name'] =  $name; 
        $_SESSION['img_path'] = $imageName;
        $_SESSION['ic_no'] = $icNo; 
        $_SESSION['email'] = $email;
        $_SESSION['phone_no'] = $phoneNumber;
        $_SESSION['faculty'] = $faculty;
        $_SESSION['course_code'] = $courseCode;
    }
} else if (isset($_POST['delete'])) {
    //Delete button is pressed
}

//Put at last so that banner profile icon is updated when upload new profile pic
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
        
        <form action="#" method="post" enctype="multipart/form-data">
        <div class="heading">
            <img class="photo_" src="/wst-ldds/profile/images/<?php echo isset($_SESSION['img_path']) ? $_SESSION['img_path'] : 'default.png';?>">

                <div class="heading-info">

                        <table>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" id="user_info" name="name" value="<?php echo $_SESSION['name'];?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td class="value">
                                    <input type="text" class="user_info" name="studentID" value="<?php echo $_SESSION['student_id'];?>" readonly>
                                </td>
                            </tr>
                        </table>


                
                    <input type="file" id="pfp" name="file">
                
                    <!-- <h3>YEOW CHEN ZHENG</h3>
                    <h5>20PMD01234</h5> -->
                </div>
            </div>
            <div class="information">
                <table>
                    <tr>
                        <td class="data">Phone No :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" name="phoneNo" value="<?php echo $_SESSION['phone_no'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">NRIC No :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" name="icNo" value="<?php echo $_SESSION['ic_no'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Email :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" name="email" value="<?php echo $_SESSION['email'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Programme :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" name="courseCode" value="<?php echo $_SESSION['course_code'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="data">Faculty :</td>
                        <td class="value"><input type="text" class="user_info" id="user_info" name="faculty" value="<?php echo $_SESSION['faculty'];?>" disabled></td>
                    </tr>
                </table>
            </div>

            <div class="button_info" id="button_info">
                <div class="delete_button" id="delete_button">
                    <input type="button" name="delete" value="Delete">
                </div>
                <div class="reset_button" id="reset_button">
                    <input type="reset" value="Reset">
                </div>
                <div class="submit_button" id="submit_button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>

        </div>
        </form>
    </div>

</body>

</html>