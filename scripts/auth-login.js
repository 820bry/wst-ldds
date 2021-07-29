window.onload = () => {
    document.getElementById("user-details").addEventListener("keypress",(e) => {
        if (e.key === "Enter")
            loginPerform();
    })
}

function loginValidate() {
    return (document.getElementById("email_id").value != "" && document.getElementById("password") != "");
}

function inputDisabled(bool) {
    document.getElementById("email_id").disabled = bool;
    document.getElementById("password").disabled = bool;
}

function loginPerform() {
    if (loginValidate()) {
        //inputDisabled(true);

        var auth_username = document.getElementById("email_id").value;
        var auth_password = document.getElementById("password").value;

        var authDetails = {
            "authType": "login",
            "auth_username": auth_username,
            "auth_password": auth_password
        }

        authJSON = JSON.stringify(authDetails);

        fetch("/wst-ldds/auth/", {
            method: "POST",
            headers: {
                "Content-type":"application/json",
            },
            body: authJSON,
        })
        .then(response => response.json())
        .then((varResponse) => {
            if (varResponse.status === "success") {
                window.alert(varResponse.status);
            } else {
                window.alert(varResponse.status);
                inputDisabled(false);
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else {
        
    }
}