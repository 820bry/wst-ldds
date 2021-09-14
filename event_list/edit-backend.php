<?php
require("./../config/session.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $_POST = json_decode(file_get_contents('php://input'), true);

    $id = $_POST["id"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $venue = $_POST["venue"];
    $capacity = $_POST["capacity"];
    $pic = $_POST["pic"];
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $deadline = $_POST["deadline"];

    require("./../config/conn.php");

    if (isset($name) && !empty($name) &&
        isset($desc) && !empty($desc) &&
        isset($venue) && !empty($venue) &&
        isset($capacity) && !empty($capacity) &&
        isset($pic) && !empty($pic) &&
        isset($date) && !empty($date) &&
        isset($start_time) && !empty($start_time) &&
        isset($end_time) && !empty($end_time) &&
        isset($deadline) && !empty($deadline)) 
    {
        $query = $conn->prepare("UPDATE ${db_event} SET name='${name}', description='${desc}', venue='${venue}', capacity='${capacity}', person_in_charge='${pic}', date='${date}', start_time='${start_time}', end_time='${end_time}', deadline='${deadline}' WHERE id=${id}");
        $query->execute();

        if($query->affected_rows > 0) {
            $response['status'] = "Success";

            echo json_encode($response);
        } else {
            $response['status'] = "Fail";

            echo json_encode($response);
        }
    } else {
        $response['status'] = "Success";

        echo json_encode($response);
    }
} else {
    $response['status'] = "Success";

    echo json_encode($response);
}
?>