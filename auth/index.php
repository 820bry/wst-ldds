<?php
    require("./../config/session.php");
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //Decode the JSON passed
        $_POST = json_decode(file_get_contents('php://input'), true);
        $vals = [
            'authType'     => $_POST["authType"],
            'username'   => $_POST["auth_username"],
            'password'   => $_POST["auth_password"],
        ];
        
        //use require() instead of include() to prevent passthrough
        require("./../config/conn.php");

        //act as a JSON API
        header("Content-Type: application/json; charset=UTF-8");

        //test
        //echo '<script>alert("'.$_GET['authType'].'")</script>';

        if (isset($_POST["authType"]) && $_POST["authType"] === "login" && isset($_POST["auth_username"]) && isset($_POST["auth_password"]) && !empty($_POST["auth_username"]) && !empty($_POST["auth_password"])) {
            
            //process login
            $auth_username = strtoupper($_POST["auth_username"]);

            //store hash since it is irreversible and we don't need to reveal passwords anyway
            //$auth_password = hash_hmac("sha256", $_GET["auth_password"], "ldds");
            $auth_password = $_POST["auth_password"];

            //we look for both student ID and email
            //use prepare() instead of query to prevent SQL injection attack
            $query1 = $conn->prepare("SELECT * FROM ".$db_member." WHERE student_id=? AND password=? ");
            $query1->bind_param("ss", $auth_username, $auth_password);
            $query1->execute();
            $result1 = $query1 -> get_result();

            $query2 = $conn->prepare("SELECT * FROM ".$db_member." WHERE email=? AND password=? ");            
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
                    $_SESSION['isAuth'] = true;
                    $vals['status'] = "success";
                    echo json_encode($vals);
                }

            } else {
                $vals['status'] = "fail";
                echo json_encode($vals);
            }
        }
    } else {
        //not POST request, assuming GET and redirect back to login page
        http_response_code(302);
        header("Location: /wst-ldds/main/LDDS%20Web/login.html");
    }
?>