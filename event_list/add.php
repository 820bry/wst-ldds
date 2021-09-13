<?php
require('./../config/session.php');

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $_POST = json_decode(file_get_contents('php://input'), true);

    $name = $_POST['new_name'];
    $venue = $_POST['new_venue'];
    $desc = $_POST['new_desc'];
    $capacity = $_POST['new_capacity'];
    $date = $_POST['new_date'];
    $start_time = $_POST['new_start_time'];
    $end_time = $_POST['new_end_time'];
    $deadline = $_POST['new_deadline'];
    $pic = $_POST['new_pic'];

    header("Content-Type: application/json; charset=UTF-8");

    if(isset($name) && !empty($name) &&
        isset($venue) && !empty($venue) &&
        isset($desc) && !empty($desc) &&
        isset($capacity) && !empty($capacity) &&
        isset($date) && !empty($date) &&
        isset($start_time) && !empty($start_time) &&
        isset($end_time) && !empty($end_time) &&
        isset($deadline) && !empty($deadline) &&
        isset($pic) && !empty($pic)) 
    {
        require("./../config/conn.php");

        $query = $conn-> prepare("INSERT INTO ${db_event} VALUES (NULL, '${name}', '${desc}', '${date}', '${start_time}', '${end_time}', '${venue}', '${capacity}', '${deadline}', '${pic}')");
        $query->execute();

        $vals = [
            'status' => "success",
        ];

        echo json_encode($vals);

    } else {
        $vals = [
            'status' => "fail",
        ];

        echo json_encode($vals);
    }
} else {
    //http_response_code(302);
    //header("Location: /wst-ldds/error");
}



?>