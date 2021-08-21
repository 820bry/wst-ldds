//Global variables
passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

function removePlaceholder(id) {
    document.getElementById(id).placeholder = '';
}

function addPlaceholder(id, x) {
    document.getElementById(id).placeholder = x;
}

function recoverPasswordPerform() {
    //Get page name
    var path = window.location.pathname;
    var page = path.split("/").pop().toLowerCase();

    if (page === "forgetpassword" || page === "forgetpassword.html") {
        var authDetails = {
            "email": document.getElementById("email").value
        }

        //Format into JSON format
        var authJSON = JSON.stringify(authDetails);

        fetch("/wst-ldds/login/sendOTP.php", {
            method: "POST",
            headers: {
                "Content-type":"application/json",
            },
            body: authJSON,
        })
        .then(response  => response.json())
        .then((varResponse) => {
            if (varResponse.status === "Success") {
                document.getElementById("error1").style.visibility = "hidden";
                window.location.href = "/wst-ldds/forgetpassword2";
            } else {
                document.getElementById("error1").style.visibility = "visible";
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else if (page === "forgetpassword2" || page === "forgetpassword2.html") {
        var authDetails = {
            "userInput": document.getElementById("OTP").value
        }

        //Format into JSON format
        var authJSON = JSON.stringify(authDetails);

        fetch("/wst-ldds/login/verifyOTP.php", {
            method: "POST",
            headers: {
                "Content-type":"application/json",
            },
            body: authJSON,
        })
        .then(response  => response.json())
        .then ((varResponse) => {
            if (varResponse.status === "Success") {
                document.getElementById("error2").style.visibility = "hidden";
                //window.location.href = "/wst-ldds/forgetpassword3";
                console.log("test");
            } else {
                document.getElementById("error2").style.visibility = "visible";
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else if (page === "forgetpassword3" || page === "forgetpassword3.html") {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("passwordconfirm").value;

        //Validate password before proceeding
        var checkPassed = true;

        if (password === confirm_password) {
            document.getElementById("error4").style.visibility = "hidden";
        }
        else {
            document.getElementById("error4").style.visibility = "visible";
            checkPassed = false;
        }

        if (passwordPattern.test(password)) {
            document.getElementById("error3").style.visibility = "hidden";
        }
        else {
            document.getElementById("error3").style.visibility = "visible";
            checkPassed = false;
        }

        if (checkPassed) {
            var authDetails = {
                "password": password
            }
    
            //Format into JSON format
            var authJSON = JSON.stringify(authDetails);
    
            fetch("/wst-ldds/login/changePassword.php", {
                method: "POST",
                headers: {
                    "Content-type":"application/json",
                },
                body: authJSON,
            })
            .then(response  => response.json())
            .then ((varResponse) => {
                if (varResponse.status === "Success") {
                    window.location.href = "/wst-ldds/forgetpassword4";
                } else {
                    alert("Fail to reset password. Please try again later.");
                }
            })
            .catch((error) => {
                console.error("Error: ", error);
            })
        }
    }
}