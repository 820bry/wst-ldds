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

    if (page === "forgetpassword1" || page === "forgetpassword1.html") {
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
                window.location.href = "/wst-ldds/forgetpassword2";
            } else {
                
            }
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    }
}