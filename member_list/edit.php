<?php
    require("./../config/session.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Decode the JSON passed
        $_POST = json_decode(file_get_contents('php://input'), true);
        $originalID = $_POST['originalID'];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $courseCode = strtoupper($_POST["courseCode"]);
        $faculty = strtoupper($_POST["faculty"]);
        $studentID = strtoupper($_POST["studentID"]);
        $phoneNumber = $_POST["phoneNumber"];
        $icNo = $_POST["icNo"];

        //use require() instead of include() to prevent passthrough
        require("./../config/conn.php");

        //act as a JSON API
        header("Content-Type: application/json; charset=UTF-8");

        if (isset($originalID) && !empty($originalID) &&
            isset($name) && !empty($name) &&
            isset($email) && !empty($email) &&
            isset($courseCode) && !empty($courseCode) &&
            isset($faculty) && !empty($faculty) &&
            isset($studentID) && !empty($studentID) &&
            isset($phoneNumber) && !empty($phoneNumber) &&
            isset($icNo) && !empty($icNo)) 
            {
                $query = $conn->prepare("UPDATE ${db_member} SET name=?, student_id=?, ic_no=?, email=?, phone_no=?, faculty=?, course_code=? WHERE student_id=?");
                $query -> bind_param("ssssssss", $name, $studentID, $icNo, $email, $phoneNumber, $faculty, $courseCode, $originalID);
                $query -> execute();

                if ($query->affected_rows > 0) {
                    $response['status'] = "Success";
            
                    echo json_encode($response);
                } else {
                    //Query didn't make any changes
                    $response['status'] = "Fail";
                    
                    echo json_encode($response);
                }    
            }
        else {
            //Field cannot be empty
            $response['status'] = "Fail";
            
            echo json_encode($response);
        }
    } else {
        //Not POST request, unsafe
        $response['status'] = "Fail";
            
        echo json_encode($response);
    }
?>