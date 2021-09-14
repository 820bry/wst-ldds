<?php

    $host       = "127.0.0.1";    // our database exists locally with the website, thus are connecting locally
    $db         = "ldds";
    $username   = "root";
    $password   = "";

    // tip: add @ to function to suppress warning
    $conn = @new mysqli($host, $username, $password, $db);
    
    if($conn -> connect_errno){
        // connection unccessful!
        // set response code to 500 Internal Server Error, and force program exit
        http_response_code(500);
        exit();
    }else{
        // lets define some variables
        $db_member = "member";
        $db_event = "event";
        $db_event_registration = "event_registration";
        $db_committee = "committee";

        // increase max_allowed_packet (https://stackoverflow.com/questions/8062496/how-to-change-max-allowed-packet-size/8062996#8062996)
        $max_allowed_packet = 16777216; //default is 1048576
        $query = $conn -> query('SET global max_allowed_packet = '.$max_allowed_packet);
        
    }

?>