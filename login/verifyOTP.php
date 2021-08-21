<?php
require("./../config/session.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Decode the JSON passed
    $_POST = json_decode(file_get_contents('php://input'), true);

    //act as a JSON API
    header("Content-Type: application/json; charset=UTF-8");

    if (isset($_POST['userInput']) && !empty($_POST['userInput'])) {
        //Verify OTP
        if ($_SESSION['otp'] == $_POST['userInput']) {
            //Verified
            $_SESSION['OTPauth'] = true;

            $response = [
                'status'=> "Success"
            ];

            unset($_SESSION['otp']);
            echo json_encode($response);
        } else {
            $response = [
                'status'=> "Fail"
            ];

            unset($_SESSION['otp']);
            echo json_encode($response);
        }
    }
}
?>