document.getElementById("").addEventListener("keypress",(e) => {
    if (e.key === "Enter")
        loginPerform();
})

function loginValidate() {
    return (document.getElementById("userName").value != "" && document.getElementById("password") != "");
}

function inputDisabled(bool) {
    document.getElementById("userName").disabled = bool;
    document.getElementById("password").disabled = bool;
}

function loginPerform() {
    if (loginValidate()) {
        inputDisabled(true);

        var auth_username = document.getElementById("userName").value;
        var auth_password = document.getElementById("password").value;

        var authDetails = {
            auth_username: auth_username,
            auth_password: auth_password
        }

        authJSON = JSON.stringify(authDetails);

        fetch("", {
            method: "post",
            headers: {
                "Content-type":"application/json",
            },
            body: authJSON,
        })
        .then(Response => Response.json())
        .then((varResponse) => {
            if (varResponse.isAuth == true) {

            } else {
                inputDisabled(false);
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else {
        
    }
}