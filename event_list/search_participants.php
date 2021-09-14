<?php
require("./../config/session.php");

header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET['value'])) {
    require("./../config/conn.php");
    
    $value = $_GET['value'];
    $eventID = $_GET['eventID'];

    if(empty($value)) {
        // return all
        $query = $conn->prepare("SELECT m.name, r.registration_id, r.student_id, r.register_date FROM ${db_member} m, ${db_event_registration} r WHERE r.event_id = ${eventID} AND m.student_id = r.student_id");
        $query->execute();
        $result = $query->get_result();
    } else {
        $query = $conn->prepare("SELECT m.name, r.registration_id, r.student_id, r.register_date FROM ${db_member} m, ${db_event_registration} r WHERE m.name LIKE ${value} AND r.event_id = ${eventID} AND m.student_id = r.student_id");
        $query->execute();
        $result = $query->get_result();
    }

    if(@boolval($result->num_rows)) {
        // Returned results
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $vals = [
            'status' => "success",
            'empty' => false,
            'results' => $rows
        ];

        echo json_encode($vals);
    } else {
        // No results returned
        $vals = [
            'status' => "success",
            'empty' => true
        ];

        echo json_encode($vals);
    }
} 

?>