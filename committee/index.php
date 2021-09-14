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
    <link rel="stylesheet" href="/wst-ldds/style/main.css">

    <title>Committee | LDDS</title>
</head>
<body class="hidden-scrollbar">

    <div class="content">
        <h1>Committee</h1>
        <div class="committee">
        <?php
             require_once("../config/conn.php");

             $query = $conn->prepare("SELECT * FROM committee;");
             $query->execute();
             $result = $query->get_result();

             while($row = $result->fetch_assoc()) {
                $memberQuery = $conn->prepare("SELECT * FROM member WHERE student_id=?");
                $studentID = $row['student_id'];
                $memberQuery->bind_param("s", $studentID);
                $memberQuery->execute();
                $memberResult = $memberQuery->get_result();
                $memberInfo = $memberResult->fetch_assoc();

                 echo '
                 <div class="committee-box">
                    <img src="/wst-ldds/profile/images/'.$memberInfo['img_path'].'" />
                    <div class="committee-info">
                        <h3>'.$row['position'].'</h3>
                        <span>'.$memberInfo['name'].'</span>
                    </div>
                </div>
                 ';
             }
        ?>
            <!-- <div class="committee-box">
                <img src="/wst-ldds/style/images/committee/Bryan.JPG" />
                <div class="committee-info">
                    <h3>President</h3>
                    <span>BRYAN LAI WEI MING</span>
                </div>
            </div>
            <div class="committee-box">
                <img src="/wst-ldds/style/images/committee/Natalyn.JPG" />
                <div class="committee-info">
                    <h3>Vice President</h3>
                    <span>NATALYN KOK LI SING</span>
                </div>
            </div>
            <div class="committee-box">
                <img src="/wst-ldds/style/images/committee/vv.JPG" />
                <div class="committee-info">
                    <h3>Secretary</h3>
                    <span>VIVIAN GOH SHIN YING</span>
                </div>
            </div>
            <div class="committee-box">
                <img src="/wst-ldds/style/images/committee/Calvin.JPG" />
                <div class="committee-info">
                    <h3>Treasurer</h3>
                    <span>CALVIN ONG ZHIEN WEI</span>
                </div>
            </div>
            <div class="committee-box">
                <img src="/wst-ldds/style/images/committee/CZ.JPG" />
                <div class="committee-info">
                    <h3>Committee Member</h3>
                    <span>YEOW CHEN ZHENG</span>
                </div>
            </div> -->
        </div>
    </div>

</body>

</html>