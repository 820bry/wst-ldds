<?php
    session_start();

    //If logged in, refresh session variables
    if (isset($_SESSION['student_id'])) {
        require_once(__DIR__."\conn.php");

        $query = $conn->prepare("SELECT * FROM ${db_member} WHERE student_id=? AND password=? ;");
        $query->bind_param("ss", $_SESSION['student_id'], $_SESSION['password']);
        $query->execute();
        $result = $query -> get_result();

        if (@boolval($result->num_rows)) {
            //Still logged in
            $respond = ($result) ? $result -> fetch_assoc() : 0;

            if (boolval($respond)) {
                $_SESSION = $respond;
            }
        } else {
            //Password changed, reset client
            session_unset();
            http_response_code(302);
            header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/login");
            exit;
        }
    }
?>