<?php
    //use require() instead of include() to prevent passthrough
    require("./../config/session.php");

    //act as a JSON API
    header("Content-Type: application/json; charset=UTF-8");

    if (isset($_GET['value']) && isset($_GET['category'])  && !empty($_GET['category'])) {
        require("./../config/conn.php");

        $value = $_GET['value'];
        //Using mysqli_real_escape_string() because column name variable aren't suitable for prepared statements
        $category = $conn->real_escape_string($_GET['category']);

        if (empty($_GET['value'])) {
            //return all
            $query = $conn->prepare("SELECT * FROM ${db_member} ORDER BY name");
            $query->execute();
            $result = $query -> get_result();
        } else {
            //return based on search results
            $searchValue = "%${value}%";

            $query = $conn->prepare("SELECT * FROM ${db_member} WHERE ${category} LIKE ?");
            $query->bind_param("s", $searchValue);
            $query->execute();
            $result = $query -> get_result();
        }

        if (@boolval($result->num_rows)) {
            //There is at least 1 row or more, fetch all the rows
            $rows = $result -> fetch_all(MYSQLI_ASSOC);
            for($i = 0; $i < count($rows); $i++) {
                unset($rows[$i]['password']);
            }

            $vals  = [
                'status' => "success",
                'empty' => false,
                'results' => $rows
            ];

            echo json_encode($vals);
        } else {
            //No rows returned
            $vals  = [
                'status' => "success",
                'empty' => true,
            ];

            echo json_encode($vals);
        }
    } else {
        //Values does not exist, return error status
        $vals  = [
            'status' => "fail",
            'error' => "Value is not set or category is empty"
        ];

        echo json_encode($vals);
    }
?>