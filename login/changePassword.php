<?php
require("./../config/session.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Decode the JSON passed
    $_POST = json_decode(file_get_contents('php://input'), true);

    //use require() instead of include() to prevent passthrough
    require("./../config/conn.php");

    //act as a JSON API
    header("Content-Type: application/json; charset=UTF-8");

    //Check if OTP is verified or not
    if ($_SESSION['OTPauth']) {
        //Verified
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $email = $_SESSION['email'];
            //Store password in hash
            $newPassword = hash_hmac("sha256", $_POST["password"], "ldds");

            $query = $conn->prepare("UPDATE ${db_member} SET password=? WHERE email=?");
            $query->bind_param("ss", $newPassword, $email);
            $query->execute();
            
            if ($query->affected_rows > 0) {
                //Updated
                $response = [
                    'status'=> "Success"
                ];
            } else {
                //No rows updated
                $response = [
                    'status'=> "Fail"
                ];
            }

            unset($_SESSION['OTPauth']);
            echo json_encode($response);
        } else {
            //Assume bypass, return Fail
            $response = [
                'status'=> "Fail"
            ];

            unset($_SESSION['OTPauth']);
            echo json_encode($response);
        }
    } else {
        //Assume bypass, return Fail
        $response = [
            'status'=> "Fail"
        ];

        unset($_SESSION['OTPauth']);
        echo json_encode($response);
    }
}
?>