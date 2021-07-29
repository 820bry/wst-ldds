var elementToBeDelete;

window.onload = () => {
    document.getElementById("event_delete").addEventListener("click", (e) => {
        if (!document.getElementById("event_delete_window").contains(e.target))
            unloadConfirmationBox();
    })
}

function loadConfirmationBox(elementFor) {
    elementToBeDelete = elementFor;
    document.getElementById("event_delete").style.visibility = "visible";
}

function unloadConfirmationBox() {
    document.getElementById("event_delete").style.visibility = "hidden";
}

function deleteEvent(bool) {
    var eventElements = document.getElementsByClassName("event");

    if (bool) {
        //Delete the event box
        for (var i = 0; i < eventElements.length; i++) {
            if (eventElements[i].contains(elementToBeDelete))
                eventElements[i].remove();
        }
        unloadConfirmationBox();
    } else {
        unloadConfirmationBox();
    }
}

function loadEventOptionBox(element) {
    element.setAttribute("onclick", "unloadEventOptionBox(this)");
    element.parentElement.parentElement.firstElementChild.style.visibility = "visible";
}

function unloadEventOptionBox(element) {
    element.setAttribute("onclick", "loadEventOptionBox(this)");
    element.parentElement.parentElement.firstElementChild.style.visibility = "hidden";
}