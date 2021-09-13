<?php
   require_once("./../config/session.php");
    require_once("./../config/conn.php");

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['eventID'])) {
            $id = "test2";
            $empty = "";
            $query = $conn->prepare("INSERT INTO ${db_event_registration} VALUES (?,?,?,now(),?)");
            $query->bind_param("ssss",$id, $_GET['eventID'],$_SESSION['student_id'], $empty);
            if ($query->execute()) {
                echo "Success";
            } else {
                echo "Fail";
            }
        }
    }
?>