<?php
require('./../config/session.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);
    $registrationID = $_POST['registrationID'];

    header("Content-Type: application/json; charset=UTF-8");

    if(isset($registrationID) && !empty($registrationID)) {
        require('./../config/conn.php');

        // they can only delete one-by-one
        $query = $conn->prepare("DELETE FROM ${db_event_registration} WHERE registration_id = ${registrationID}");
        $query->execute();

        $vals = [
            'status' => "success",
        ];

        echo json_encode($vals);
        
    } else {
        if(empty($registrationID)) {
            $vals = [
                'status' => "fail",
                'error' => "Registration ID is empty"
            ];

            echo json_decode($vals);
        } else {
            http_response_code(302);
            header("Location: /wst-ldds/error");
        }
    }

} else {
    http_response_code(302);
    header("Location: /wst-ldds/error");
}

?>