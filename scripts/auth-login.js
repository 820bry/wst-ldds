//Element declaration
const formElement = document.getElementById("user-details");
const emailElement = document.getElementById("email_id");
const passwordElement = document.getElementById("password");
const emailErrorMessageElement = document.getElementById("inputError1");
const passwordErrorMessageElement = document.getElementById("inputError2");

window.onload = () => {
    formElement.addEventListener("keypress",(e) => {
        if (e.key === "Enter")
            loginPerform();
    })
}

function loginValidate() {
    return (emailElement.value != "" && passwordElement.value != "");
}

function inputDisabled(bool) {
    emailElement.disabled = bool;
    passwordElement.disabled = bool;
}

function resetErrorMessage() {
    emailErrorMessageElement.style.visibility = "hidden";
    passwordErrorMessageElement.style.visibility = "hidden";
}

function loginPerform() {
    resetErrorMessage();

    if (loginValidate()) {
        //inputDisabled(true);

        var auth_username = emailElement.value;
        var auth_password = passwordElement.value;

        var authDetails = {
            "authType": "login",
            "auth_username": auth_username,
            "auth_password": auth_password
        }

        //Format into JSON format
        var authJSON = JSON.stringify(authDetails);

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
                window.location.replace("/wst-ldds/home");
            } else {
                window.alert(varResponse.status);
                emailErrorMessageElement.style.visibility = "visible";
                emailErrorMessageElement.innerHTML = "Invalid Email/Student ID";
                passwordErrorMessageElement.style.visibility = "visible";
                passwordErrorMessageElement.innerHTML = "Invalid Password";
                //inputDisabled(false);
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else {
        //Input empty
        if (emailElement.value === "") {
            emailErrorMessageElement.style.visibility = "visible";
            emailErrorMessageElement.innerHTML = "Empty Email/Student ID";
        }
        if (passwordElement.value === "") {
            passwordErrorMessageElement.style.visibility = "visible";
            passwordErrorMessageElement.innerHTML = "Empty Password";
        }
    }
}