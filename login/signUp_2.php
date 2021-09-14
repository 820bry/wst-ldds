<!DOCTYPE html>
<html lang = en dir ="ltr">

<head>
<link rel="stylesheet" href="/wst-ldds/login/signstyle.css">
<meta charset="UTF-8">

<title>LDDS Register</title>

</head>
<body class = "signbody" style = "background-image: url('/wst-ldds/login/assets/lddsbg.png'); background-size: cover;">
    <div class = "signcontainer">
        <img src="/wst-ldds/style/images/back icon.png" class="back" onclick="window.history.back();">
        <div class = "logo">
            <img src="/wst-ldds/login/assets/Ldds.png">
        </div>
        <div class = "title">
            <span id = "label">Create Account</span>
        </div>
        <div class = "signupAccount">
                <div class = "user-details" id="user-details">
                    <div class = "inputbox inputbox1">
                        <input type="text" placeholder="Course Code" class="ccode" name="ccode" id="ccode" required>
                        <input type="text" placeholder="Faculty" class="faculty" name="faculty" id="faculty" required>
                    </div>
                    <span class = "inputError" id = "error5">Invalid Course Code</span>
                    <span class = "inputError" id = "error6">Invalid Faculty Code</span>
                    <div class = "inputbox inputbox3">
                        <input type="text" placeholder="Student ID" class = "studID" name = "studID" id = "studID" required>
                    </div>
                    <span class = "inputError" id = "error7">Invalid Student ID</span>
                    <div class = "inputbox inputbox4">
                        <input type = "tel" placeholder="Phone Number" class = "pnum" name = "pnum" id = "pnum" required>
                    </div>
                    <span class = "inputError" id = "error8">Invalid Phone Number</span>
                    <div class = "inputbox inputbox4">
                        <input type = "text" placeholder="NRIC number" class = "nric" name = "nric" id = "nric" required> 
                    </div>
                    <span class = "inputError" id = "error9">Invalid NRIC Number</span>
                </div>
                    <div class = "button">
                        <button onclick="signupPerform()">Sign Up</button>
                    </div>
        </div>
    </div>
    <script src="/wst-ldds/scripts/auth-signup.js"></script>
</body>

</html>