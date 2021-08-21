<?php
    require("./../config/session.php");

    if (isset($_SESSION['OTPauth']) && !empty($_SESSION['OTPauth'])) {
        if ($_SESSION['OTPauth']) {
            //Authorized, do nothing
        } else {
            //Assume bypass, redirect to home page
            header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/home");
            exit;
        }
    } else {
        //Assume bypass, redirect to home page
        header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/home");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    
    <script src="/wst-ldds/scripts/forgetpassword.js"></script>
    <link rel="stylesheet" href="/wst-ldds/style/login.css">
    <script src="/wst-ldds/scripts/login.js"></script>

    <title>Forget Password</title>
</head>
<body style="display: flex;justify-content: center;">
    <div class="box" style="display: flex;flex-direction: column;/* margin: auto; */">
        <div style="display: flex;padding: 1.4rem 1rem 0 1.5rem; align-items: flex-end;">
            <img src="/wst-ldds/style/images/back icon.png" class="back" onclick="window.history.back();">
        </div>
        <div style="display: flex;align-items: center;padding: 1rem;flex-direction: column;">
            <img src="/wst-ldds/style/images/lock icon.png" class="lock">
        </div>
        <div style="display: flex;flex-direction: column;padding: 1rem;width: -moz-available;align-items: center;color: white;margin: 2rem auto 10rem;gap: .7rem;">
            <a class="forgetPassword1">Change Password</a>
            <div class="input-container" style="border-radius: 10px;background-color: #363636;display: flex;padding: 0 1rem;align-items: center;">
                <div class="material-icons">lock</div>
                <input type="password" name="New_Password" id="password" placeholder="New Password" onfocus="removePlaceholder(this.id)" onfocusout="addPlaceholder(this.id, 'New Password')" style="background: none;color: white;padding: 0.9rem 0.6rem 0.6rem; width: 12rem;">
            </div>
            <span class = "inputError" id = "error3">Password must consist of at least 1 upper character and 1 number</span>
            <br>
            <div class="input-container" style="border-radius: 10px;background-color: #363636;display: flex;padding: 0 1rem;align-items: center;">
                <div class="material-icons">lock</div>
                <input type="password" name="Confirm_Password" id="passwordconfirm" placeholder="Confirm Password" onfocus="removePlaceholder(this.id)" onfocusout="addPlaceholder(this.id, 'Confirm Password')" style="background: none;color: white;padding: 0.9rem 0.6rem 0.6rem; width: 12rem;">
            </div>
            <span class = "inputError" id = "error4">Password does not match</span>
        </div>
        <button class="nextBtn3" onclick="recoverPasswordPerform()">Next</button>
    </div>
</body>
</html>