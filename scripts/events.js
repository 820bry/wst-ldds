window.onload = () => {
    document.getElementById("event_delete").addEventListener("click", (e) => {
        if (e.target != document.getElementById("event_delete_window"))
            unloadConfirmationBox();
    })
}

function loadConfirmationBox() {
    document.getElementById("event_delete").style.visibility = "visible";
}

function unloadConfirmationBox() {
    document.getElementById("event_delete").style.visibility = "hidden";
}

function loadEventOptionBox(x) {
    x.setAttribute("onclick", "unloadEventOptionBox(this)");
    x.parentElement.parentElement.firstElementChild.style.visibility = "visible";
}

function unloadEventOptionBox(x) {
    x.setAttribute("onclick", "loadEventOptionBox(this)");
    x.parentElement.parentElement.firstElementChild.style.visibility = "hidden";
}