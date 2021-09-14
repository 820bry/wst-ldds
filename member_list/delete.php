<?php
    require("./../config/session.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Decode the JSON passed
        $_POST = json_decode(file_get_contents('php://input'), true);
        $studentID = $_POST['studentID'];

        //act as a JSON API
        header("Content-Type: application/json; charset=UTF-8");

        if (isset($studentID) && !empty($studentID)) {
            //Student ID exists, proceed to delete
            require("./../config/conn.php");

            for ($i = 0; $i < count($studentID); $i++) {
                $studentID[$i] = "'".$studentID[$i]."'";
            }

            //More than 1 ID, join them for SQL
            $studentID = implode(',', $studentID);

            $query = $conn-> prepare("DELETE FROM ${db_member} WHERE student_id IN (${studentID})");
            $query->execute();

            $vals = [
                'status' => "success",
            ];

            echo json_encode($vals);
        } else {
            //Student ID not set or empty
            if (empty($studentID)) {
                //Empty, assume is system error
                $vals  = [
                    'status' => "fail",
                    'error' => "Student ID is empty"
                ];
        
                echo json_encode($vals);
            } else {
                //Not set, suspicious connection
                http_response_code(302);
                header("Location: /wst-ldds/error");
            }
        }

    } else {
        //Not using POST method, assuming GET so it is not secure enough
        http_response_code(302);
        header("Location: /wst-ldds/error");
    }
?>