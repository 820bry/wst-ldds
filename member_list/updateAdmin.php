<?php
    require("./../config/session.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Decode the JSON passed
        $_POST = json_decode(file_get_contents('php://input'), true);
        $studentID = $_POST["studentID"];
        $permission_level = $_POST["permission_level"];

        //use require() instead of include() to prevent passthrough
        require("./../config/conn.php");

        //act as a JSON API
        header("Content-Type: application/json; charset=UTF-8");

        if (isset($studentID) && !empty($studentID) &&
            isset($permission_level)) 
            {
                $query = $conn->prepare("UPDATE ${db_member} SET permission_level=? WHERE student_id=?");
                $query -> bind_param("is", $permission_level, $studentID);
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