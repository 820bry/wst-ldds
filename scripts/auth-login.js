//Element declaration
formElement = document.getElementById("user-details");
emailElement = document.getElementById("email_id");
passwordElement = document.getElementById("password");

window.onload = () => {
    formElement.addEventListener("keypress",(e) => {
        if (e.key === "Enter")
            loginPerform();
    })
}

function loginValidate() {
    return (emailElement.value != "" && passwordElement != "");
}

function inputDisabled(bool) {
    emailElement.disabled = bool;
    passwordElement.disabled = bool;
}

function loginPerform() {
    if (loginValidate()) {
        //inputDisabled(true);

        var auth_username = emailElement.value;
        var auth_password = passwordElement.value;

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
        //Input empty
    }
}