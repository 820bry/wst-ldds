function signout() {
    var authDetails ={
        "authType": "signout"
    }

    var authJSON = JSON.stringify(authDetails);

    fetch("/wst-ldds/auth/", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: authJSON,
    })
    .then(response => response.json())
    .then((varResponse) => {
        if (varResponse.status === "success") {
            window.location.replace("/wst-ldds/home");
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })

}