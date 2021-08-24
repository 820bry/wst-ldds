<html class="mdl-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css">
    <script defer="" src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    
    <link rel="stylesheet" href="/wst-ldds/style/login.css">
    <script src="/wst-ldds/scripts/forgetpassword.js"></script>

    <title>Forget Password</title>
</head>

<body style="display: flex;justify-content: center;">
    <div class="box" style="display: flex;flex-direction: column;">
        <div style="display: flex;padding: 1.4rem 1rem 0 1.5rem; align-items: flex-end;"><img src="/wst-ldds/style/images/back icon.png" class="back" onclick="window.history.back();"></div>
        <div style="display: flex;/*! justify-content: center; */align-items: center;padding: 1rem;/*! margin: 1rem; *//*! background: white; *//*! gap: 1rem; */flex-direction: column;height: 100%;">
            <img src="/wst-ldds/style/images/lock icon.png" class="lock"><a class="forgetPassword1">Forget Password</a>
            <div style="display: flex;flex-direction: column;padding: 1rem;width: -moz-available;height: 50%;align-items: center;color: white;margin-top: 2rem;gap: .7rem;">
                <div class="input-container"
                    style="display: flex;border-radius: 10px;background-color: #363636;padding: 1rem;gap: .9rem;">
                    <div class="material-icons" style="left: 0;">email</div>
                    <input type="email" name="email" id="email" placeholder="Email" onfocus="removePlaceholder(this.id)"
                        onfocusout="addPlaceholder(this.id, 'Email')" style="background: none;color: white;"/>
                </div>
                <span class = "inputError" id = "error1">Invalid Email</span>
            </div><button class="nextBtn1" onclick="recoverPasswordPerform()">Next</button>
        </div>

        <br>

        <br>
        <div></div>

        <br>

    </div>

</body>

</html>