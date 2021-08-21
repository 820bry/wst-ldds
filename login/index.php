<!DOCTYPE html>
<html lang = en dir ="ltr">

<head>
<link rel="stylesheet" href="signstyle.css">
<meta charset="UTF-8">

<title>LDDS Login</title>

</head>
<body class = "logbody">
<div class = "logincontainer">
<h1 id = "label">Login to Your Account</h1>
    <div class = "user-details" id="user-details">
        <div class = "inputbox">
            <input type = "text" placeholder="Email / Student ID" class = "email_id" id="email_id" name = "email_id" required>
            <span class = "inputError" id = "inputError1">Invalid Email/Student ID</span>
            <br>
        </div>
         
        <div class = inputbox>
            <input type="password" placeholder="Password" class = "password" id="password" name = "password" required>
            <span class = "inputError" id = "inputError2">Invalid Password</span>
            <br>
        </div>
        
    </div>
        <div class = "remember">
            <input type="checkbox" name="RememberMe" id="chckbox">
            <label for="chckbox">Remember Me</label>
        </div>
        <div id = "fgtpwd"><a href="/wst-ldds/forgetpassword">Forgot Password?</a></div>
        <div class = "button">
            <button onclick="loginPerform()">Login to Your Account</button>
        </div>
    <div class = "signup">
        Not a member yet ? <a href="signUp.html">Register Now</a>
    </div>
    <div class = "logo">
        <img src = "/wst-ldds/login/assets/Ldds.png">
        <img src="/wst-ldds/login/assets/tarc.png">
    </div>
</div>
<div class = "wlcmback" id = "wlcmback">
    <img src="/wst-ldds/login/assets/Welcome_back.png" class = "logimg">
</div>
<script src="/wst-ldds/scripts/auth-login.js"></script>
</body>
</html>