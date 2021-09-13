<?php
require ('./../config/session.php');

if($_SERVER["REQUEST_METHOD"] === "POST") {
    // Decode the JSON passed
    $_POST = json_decode(file_get_contents('php://input'), true);
    $eventID = $_POST['eventID'];

    // act as a JSON API
    header("Content-Type: application/json; charset=UTF-8");

    if(isset($eventID) && !empty($eventID)) {
        // Event ID exists, proceed to delete
        require("./../config/conn.php");

        for($i = 0; $i < count($eventID); $i++) {
            $eventID[$i] = "'$eventID[$i]'";
        }

        // More than 1 ID, join them for SQL
        $eventID = implode(',', $eventID);

        $query = $conn-> prepare ("DELETE FROM ${db_event} WHERE id IN (${eventID})");
        $query->execute();

        $vals = [
            'status' => "success",
        ];

        echo json_encode($vals);
    } else {
        // Event ID not set or empty
        if(empty($eventID)) {
            // Empty, assume is system error
            $vals = [
                'status' => "fail",
                'error' => "Event ID is empty"
            ];

            echo json_decode($vals);
        } else {
            // Not set, suspicious connection
            http_response_code(302);
            header("Location: /wst-ldds/error");
        }
    }
} else {
    // Not using POST method. assuming GET so it is not secure enough
    http_response_code(302);
    header("Location: /wst-ldds/error");
}

?>