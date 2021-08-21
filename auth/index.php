<?php
    require("./../config/session.php");
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Decode the JSON passed
        $_POST = json_decode(file_get_contents('php://input'), true);
        $vals = [
            'authType'   => $_POST["authType"]
        ];
        
        //use require() instead of include() to prevent passthrough
        require("./../config/conn.php");

        //act as a JSON API
        header("Content-Type: application/json; charset=UTF-8");

        if (isset($_POST["authType"]) && $_POST["authType"] === "login" && isset($_POST["auth_username"]) && isset($_POST["auth_password"]) && !empty($_POST["auth_username"]) && !empty($_POST["auth_password"])) {
            //process login
            $auth_username = strtoupper($_POST["auth_username"]);

            //store hash since it is irreversible and we don't need to reveal passwords anyway
            $auth_password = hash_hmac("sha256", $_POST["auth_password"], "ldds");
            //$auth_password = $_POST["auth_password"];

            //we look for both student ID and email
            //use prepare() instead of query to prevent SQL injection attack
            $query1 = $conn->prepare("SELECT * FROM ${db_member} WHERE student_id=? AND password=? ");
            $query1->bind_param("ss", $auth_username, $auth_password);
            $query1->execute();
            $result1 = $query1 -> get_result();

            $query2 = $conn->prepare("SELECT * FROM ${db_member} WHERE email=? AND password=? ");            
            $query2->bind_param("ss", $auth_username, $auth_password);
            $query2->execute();
            $result2 = $query2 -> get_result();

            //@ to surpress warnings
            if (@boolval($result1->num_rows) || @boolval($result2->num_rows)) {
                //convert result to array
                $respond1 = ($result1) ? $result1 -> fetch_assoc() : 0;
                $respond2 = ($result2) ? $result2 -> fetch_assoc() : 0;

                if (boolval($respond1) || boolval($respond2)) {
                    //authenticated
                    $userDetails = boolval($respond1) ? $respond1 : $respond2;
                    $_SESSION['isAuth'] = true;

                    //Based on https://stackoverflow.com/questions/2140090/operator-for-array-in-php, 
                    //$userDetails should be at the left side to make sure its value will overwrite the ones in $_SESSION
                    $_SESSION = $userDetails + $_SESSION;

                    $vals['status'] = "success";
                    echo json_encode($vals);
                }

            } else {
                $vals['auth_username'] = $auth_username;
                $vals['auth_password'] = $auth_password;
                $vals['status'] = "fail";
                echo json_encode($vals);
            }

            $conn -> close();
        } else if(isset($_POST["authType"]) && $_POST["authType"] === "signup" && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["courseCode"]) && isset($_POST["faculty"]) && isset($_POST["studentID"]) && isset($_POST["phoneNumber"]) && isset($_POST["icNo"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["courseCode"]) && !empty($_POST["faculty"]) && !empty($_POST["studentID"]) && !empty($_POST["phoneNumber"]) && !empty($_POST["icNo"])) {
            //process signup
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = hash_hmac("sha256", $_POST["password"], "ldds");
            $courseCode = $_POST["courseCode"];
            $faculty = $_POST["faculty"];
            $studentID = $_POST["studentID"];
            $phoneNumber = $_POST["phoneNumber"];
            $icNo = $_POST["icNo"];

            $query = $conn->prepare("INSERT INTO ${db_member} (`name`, `student_id`, `password`, `ic_no`, `email`, `phone_no`, `faculty`, `course_code`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $query -> bind_param("ssssssss", $name, $studentID, $password, $icNo, $email, $phoneNumber, $faculty, $courseCode);
            $query -> execute();

            if ($query->affected_rows > 0) {
                $vals['status'] = "success";
            }else {
                $vals['status'] = "fail";
            }            

            $conn -> close();
            echo json_encode($vals);
        } else if (isset($_POST["authType"]) && $_POST["authType"] === "signout") {
            //process signout, destroy session
            session_destroy();

            $vals['status'] = "success";
            echo json_encode($vals);
        }
    } else {
        //not POST request, assuming GET and redirect back to login page
        http_response_code(302);
        header("Location: /wst-ldds/error");
    }
?>