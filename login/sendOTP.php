<?php
require("includes/PHPMailer.php");
require("includes/SMTP.php");
require("includes/Exception.php");
require("./../config/session.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //Decode the JSON passed
    $_POST = json_decode(file_get_contents('php://input'), true);

    //use require() instead of include() to prevent passthrough
    require("./../config/conn.php");

    //act as a JSON API
    header("Content-Type: application/json; charset=UTF-8");

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        //Validate email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = $conn->prepare("SELECT * FROM ${db_member} WHERE email=?");
            $query->bind_param("s", $email);
            $query->execute();
            $result = $query -> get_result();
    
            //@ to surpress warnings
            if (@boolval($result->num_rows)) {
                //Email exists, send OTP
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $otp = mt_rand(100000,999999);
    
                //Store in session for verification later
                $_SESSION['email'] = $email;
                $_SESSION['otp'] = $otp;
    
                //Email setup                    
                $mail->isSMTP();                                            
                $mail->Host      = 'ssl://smtp.gmail.com';                  
                $mail->SMTPAuth   = true;                                   
                $mail->Username  = 'lddswebsystem@gmail.com';               //Gmail account name.
                $mail->Password  = '@LddsWebSystem';                        //Gmail password.
                $mail->Port       = 465;                                    
    
                try
                {
                    // Mail details.
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    mt_srand(time());
                    $mail->SetFrom('lddswebsystem@gmail.com', 'LDDS Password System');
                    $mail->AddAddress($email);
                    $mail->Subject  = 'Forget Password OTP';
                    $mail->Body     = 'Your OTP is <b>'.$otp.'</b>';
    
                    $mail->IsHTML(true);
                    $mail->Send();
    
                    $response = [
                        'status'=> "Success"
                    ];
    
                    echo json_encode($response);
                }
                catch (Exception $e) {
                    $response = [
                        'status'=> "Fail",
                        'error' => $e->errorMessage()
                    ];
    
                    echo json_encode($response);
                } catch (\Exception $e) {
                    $response = [
                        'status'=> "Fail",
                        'error' => $e->getMessage()
                    ];
    
                    echo json_encode($response);
                }
        } else {
            //Email not valid
            $response = [
                'status'=> "Fail"
            ];

            echo json_encode($response);
        }
        

        } else {
            //Email does not exists
            $response = [
                'status'=> "Fail"
            ];

            echo json_encode($response);
        }

    }
}
?>