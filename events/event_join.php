<?php
   require_once("./../config/session.php");
    require_once("./../config/conn.php");

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['eventID'])) {
            $id = "test2";
            $query = $conn->prepare("INSERT INTO ${db_event_registration} VALUES (?,?,?,now())");
            $query->bind_param("sss",$id, $_GET['eventID'],$_SESSION['student_id']);
            if ($query->execute()) {
                echo "Success";
            } else {
                echo "Fail";
            }
        }
    }
?>