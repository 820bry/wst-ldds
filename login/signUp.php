<?php
require("./../config/session.php");

if (isset($_SESSION['permission_level'])) {
    //permission_level set, assume logged in
    header("Location: http://".$_SERVER['HTTP_HOST']."/wst-ldds/home");
    exit;
}
?>
<!DOCTYPE html>
<html lang = en dir ="ltr">

<head>
<link rel="stylesheet" href="/wst-ldds/login/signstyle.css">
<meta charset="UTF-8">

<title>LDDS Register</title>

</head>
<body class = "signbody" style = "background-image: url('/wst-ldds/login/assets/lddsbg.png'); background-size: cover;">
    <div class = "signcontainer">
        <div class = "logo">
            <img src="/wst-ldds/login/assets/Ldds.png">
        </div>
        <div class = "title">
            <span id = "label">Create Account</span>
        </div>
        <div class = "signupAccount">
                <div class = "user-details" id="user-details">
                    <div class = "inputbox inputbox2">
                        <input type = "text" placeholder="Name" class = "name" name = "name" id = "name" required> 
                    </div>
                    <span class = "inputError" id = "error1">Invalid Name</span>
                    <div class = "inputbox inputbox2">
                        <input type="text" placeholder="Email" class="email" name="email" id="email" required>
                    </div>
                    <span class = "inputError" id = "error2">Invalid E-Mail</span>
                    <div class = "inputbox inputbox3">
                        <input type="password" placeholder="Password" class = "pwd" name = "pwd" id="pwd" required>
                    </div>
                    <span class = "inputError" id = "error3">Password must consist of at least 1 upper character and 1 number</span>
                    <div class = "inputbox inputbox4">
                        <input type = "password" placeholder="Re-enter Password" class = "repwd" name = "repwd" id="repwd" required>
                    </div>
                    <span class = "inputError" id = "error4">Passwords Do Not Match</span>
                </div>
                    <div class = "button">
                        <button onclick="nextPage()">Next</button>                    </div>
            <div class = "login">
                Already have an account ? <a href="/wst-ldds/login">Login Now</a>
            </div>
        </div>
    </div>
    <script src="/wst-ldds/scripts/auth-signup.js"></script>
</body>
</html>