<?php
    require("./../config/session.php");
    require("./../config/conn.php");

    $query = $conn->prepare("SELECT * FROM ${db_member}");
    $query->execute();
    $result = $query -> get_result();

    if ($result->num_rows > 0) {
        $delimiter = ","; 
        $filename = "members-data_" . date('Y-m-d') . ".csv";

        //Create the file pointer
        $f = fopen('php://memory', 'w'); 

        //Set column headers
        //Match the headers with the one in the database so it can be straight import into another database if needed
        //Please note that password is not exported due to safety purpose
        $fields = array('name', 'student_id', 'ic_no', 'email', 'phone_no', 'faculty', 'course_code', 'permission_level'); 
        fputcsv($f, $fields, $delimiter);

        //Output each row of the data, format line as CSV and write to file pointer
        while ($row = $result->fetch_assoc()) {
            $lineData = array($row['name'], $row['student_id'], $row['ic_no'], $row['email'], $row['phone_no'], $row['faculty'], $row['course_code'], $row['permission_level']);
            fputcsv($f, $lineData, $delimiter);
        }

        //Move back to beginning of file
        fseek($f, 0);

        //Set headers to download the file rather than displaying it
        header("Content-Type: text/csv");
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        //Output all remaining data on a file pointer
        fpassthru($f);
    }

    exit;
?>