<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['studentID']) && isset($_GET['position'])) {
            require_once("../config/conn.php");

            $studentID = $_GET['studentID'];
            $position = $_GET['position'];

            $query = $conn->prepare("UPDATE committee SET student_id=? WHERE position=?;");
            $query->bind_param("ss", $studentID, $position);
            $query->execute();
            $result = $query->get_result();

            if ($query->affected_rows > 0) {
                echo "Success";
            }
        }
    }
?>