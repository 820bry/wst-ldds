// Global Variables
page = 1;
noOfRowsPerPage = 3;
sortBy = "name";
sortDirection = "asc";
rowItems = [];

//Onload, not using window.onload to prevent conflict with other js file
search(1, sortBy, sortDirection);

function notificationMsg(message) {
    var notification = document.querySelector('.mdl-js-snackbar');
    notification.MaterialSnackbar.showSnackbar(
    {
        "message": message
    }
    );
}

function checkAllBox(element) {
    var tableRows = document.getElementById("event_list").rows;

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        var checkboxRow = tableRows[i].firstElementChild.firstElementChild;

        if (element.checked) {
            checkboxRow.classList.add("is-checked");
        } else {
            checkboxRow.classList.remove("is-checked");
        }  
    }
}

function deleteRowRequest(eventIDs) {
    var deleteDetails = {
        "eventID": eventIDs
    };

    var deleteJSON = JSON.stringify(deleteDetails);

    fetch("/wst-ldds/event_list/delete.php", {
        method: "POST",
        headers: {
            "Content-type":"application/json",
        },
        body: deleteJSON
    })
    .then(response => response.json())
    .then((varResponse) => {
        if (varResponse.status === "success") {
            //Refresh table
            search(page, sortBy, sortDirection);
            notificationMsg("Row deleted successfully");
        } else {
            notificationMsg("Error occured. Please try again later.");
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })
}

function deleteSelectedRow() {
    var tableRows = document.getElementById("event_list").rows;
    var eventID = [];
    var noOfCheckedRows = 0;

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        //Remove if the checkbox is checked
        var checkboxRow = tableRows[i].firstElementChild.firstElementChild;

        if (checkboxRow.classList.contains("is-checked")) {
            eventID.push(tableRows[i].children[2].firstElementChild.value);
            tableRows[i].remove();
            noOfCheckedRows++;
            i--;
        }
    }

    //If no rows selected, notify user
    if (noOfCheckedRows == 0) {
        notificationMsg("No rows selected");
    } else {
        deleteRowRequest(eventID);
    }

    
}

function deleteRow(element) {
    var tableRows = document.getElementById("event_list").rows;
    var eventID = [];

    for (i = 1; i < tableRows.length; i++) {
        if (tableRows[i].contains(element)) {
            eventID.push(tableRows[i].children[1].innerText);
            tableRows[i].remove();  
        }
    }

    deleteRowRequest(eventID);
}

function clearTable() {
    var tableBody = document.getElementById("event_list").children[1];
    tableBody.innerHTML = "";
}

function search(noOfPage, sortBy, sortDirection) {
    //In case of input smaller than 1
    if(noOfPage < 1) noOfPage = 1;

    globalThis.sortBy = sortBy;

    if (sortDirection === "asc" || sortDirection === "desc") globalThis.sortDirection = sortDirection;

    page = noOfPage;
    var searchBar = document.getElementById("searchbar");
    var category = document.getElementById("choose_item").value;
    var searchValue = searchBar.value;

    fetch(`/wst-ldds/event_list/search.php?value=${searchValue}&category=${category}&sortBy=${sortBy}&sortDirection=${sortDirection}`)
    .then(response => response.json())
    .then((varResponse) => {
        if (varResponse.status === "success") {
            clearTable();

            if (!varResponse.empty) {
                //Results returned are not empty
                var tableBody = document.getElementById("event_list").children[1];
                var no = 1;
                var resultsArray = varResponse.results;

                if (page > 1 && resultsArray.length < ((page-1)*noOfRowsPerPage)+1) {
                    //Page no more than 1 but there isn't anything to show, reduce page by 1
                    search(noOfPage-1, sortBy, sortDirection);
                    return;
                }

                //Page update
                if ((page * noOfRowsPerPage) > resultsArray.length) {
                    document.getElementById("page-count").innerHTML = `${(page-1)*noOfRowsPerPage+1}-${(resultsArray.length)} of ${resultsArray.length}`;
                } else {
                    document.getElementById("page-count").innerHTML = `${(page-1)*noOfRowsPerPage+1}-${(page * noOfRowsPerPage)} of ${resultsArray.length}`;
                }
                

                //Previous page button update
                if (page > 1) {
                    document.getElementById("prev").disabled = false;
                } else {
                    document.getElementById("prev").disabled = true;
                    $('#prev-tooltip.is-active').removeClass('is-active');
                }

                //Next page button update
                if (((page)*noOfRowsPerPage) < resultsArray.length) {
                    document.getElementById("next").disabled = false;
                } else {
                    document.getElementById("next").disabled = true;
                    $('#next-tooltip.is-active').removeClass('is-active');
                }

                for (i = (page-1)*noOfRowsPerPage; i < resultsArray.length && i < (page * noOfRowsPerPage);i++) {
                    var checked = (resultsArray[i].permission_level === 0) ? "" : "checked";
                    var rowHTML = `
                    <tr>
                        <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-${no}"><input type="checkbox" id="checkbox-${no}" class="mdl-checkbox__input"></label></td>
                        <td>${resultsArray[i].id}</td>
                        <td>${resultsArray[i].name}</td>
                        <td>${resultsArray[i].person_in_charge}</td>
                        <td>${resultsArray[i].date}</td>
                        <td>${resultsArray[i].start_time}</td>
                        <td>${resultsArray[i].end_time}</td>
                        <td>${resultsArray[i].venue}</td>
                        <td>${resultsArray[i].capacity}</td>
                        <td>${resultsArray[i].deadline}</td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="show${no}"><i class="material-icons">launch</i></button>
                            <div class="mdl-tooltip" for="show${no}">Show Participants List</div>
                        </td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}"><i class="material-icons">edit</i></button>
                            <div class="mdl-tooltip" for="edit${no}">Edit</div>
                        </td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="delete${no}" onclick="deleteRow(this)"><i class="material-icons">delete</i></button>
                            <div class="mdl-tooltip" for="delete${no}">Delete</div>
                        </td>
                    </tr>`;
                    
                    tableBody.innerHTML += rowHTML;
                    no++;
                }
            }
        } else {
            alert("There is current some problem with search function, please try again later.");
        }
    })
    .then(() => {
        //Only runs after adding all the rows, due to async problem :p

        //MDL upgrade element to make it works
        var noOfRows = document.getElementById("event_list").rows.length;

        for (i = 1; i < noOfRows; i++) {
            var row = document.getElementById("event_list").rows[i];
            componentHandler.upgradeElement(row.children[0].children[0]);
            componentHandler.upgradeElement(row.children[10].children[0]);
            componentHandler.upgradeElement(row.children[10].children[1]);
            componentHandler.upgradeElement(row.children[11].children[0]);
            componentHandler.upgradeElement(row.children[11].children[1]);
            componentHandler.upgradeElement(row.children[12].children[0]);
            componentHandler.upgradeElement(row.children[12].children[1]);
        }
        
    })
    .catch((error) => {
        console.log("Error: ", error);
    })
}


function sortByElement(element) {
    var elementText =  element.innerText.split(" ");
    var arrowDirection = elementText.pop(); //Pop out the keyboard direction into the variable
    var sortByValue = elementText.join(" "); //Remove last text, leaving value with space intact

    if (arrowDirection === "keyboard_arrow_up") {
        sortDirection = "asc";
        element.children[0].innerHTML = "keyboard_arrow_down";
    } else {
        sortDirection = "desc";
        element.children[0].innerHTML = "keyboard_arrow_up";
    }

    //Reset all table head arrows
    var tableHeads = document.getElementsByTagName("th");
    for (i = 1; i < tableHeads.length; i++) {
        if (tableHeads[i].children.length === 1 && !tableHeads[i].contains(element)) {
            tableHeads[i].children[0].innerHTML = "keyboard_arrow_down";
        }
    }

    if (sortByValue === "Event ID") sortByValue = "id";
    else if (sortByValue === "Event Name") sortByValue = "name";
    else if (sortByValue === "Person In-Charge") sortByValue = "person_in_charge";
    else if (sortByValue === "Start Time") sortByValue = "start_time";
    else if (sortByValue === "End Time") sortByValue = "end_time";
    else if (sortByValue === "Venue") sortByValue = "venue";
    else if (sortByValue === "Capacity") sortByValue = "capacity";
    else if (sortByValue === "Register Deadline") sortByValue = "deadline";

    search(1, sortByValue, sortDirection);
}

function addEventRequest(name, venue, desc, capacity, date, start_time, end_time, deadline, pic) {
    var dialog = document.querySelector('dialog');
    var eventDetails = {
        "new_name" : name,
        "new_venue" : venue,
        "new_desc" : desc,
        "new_capacity" : capacity,
        "new_date" : date,
        "new_start_time" : start_time,
        "new_end_time" : end_time,
        "new_deadline" : deadline,
        "new_pic" : pic
    };

    var addJSON = JSON.stringify(eventDetails);

    fetch("/wst-ldds/event_list/add.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: addJSON
    })
    .then(response => response.json())
    .then((varResponse) => {
        if(varResponse.status === "success") {
            search(page, sortBy, sortDirection);
            dialog.close();
            notificationMsg("Event added.");
        } else {
            dialog.close();
            notificationMsg("Error occured.");
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })
}

// function to be called when button is pressed
function addEvent() {

    resetErrorMsgs();

    var name = document.getElementById("new_name").value;
    var venue = document.getElementById("new_venue").value;
    var desc = document.getElementById("new_desc").value;
    var capacity = document.getElementById("new_capacity").value;
    var date = document.getElementById("new_date").value;
    var start_time = document.getElementById("new_start_time").value;
    var end_time = document.getElementById("new_end_time").value;
    var deadline = document.getElementById("new_deadline").value;
    var pic = document.getElementById("new_pic").value;

    if(name == "") document.getElementById("name-error").style.visibility = "visible";
    else if(venue == "") document.getElementById("venue-error").style.visibility = "visible";
    else if(date == "") document.getElementById("date-error").style.visibility = "visible";
    else if(start_time == "") document.getElementById("start-time-error").style.visibility = "visible";
    else if(end_time == "") document.getElementById("end-time-error").style.visibility = "visible";
    else if(deadline == "") document.getElementById("deadline-error").style.visibility = "visible";
    else if(pic == "") document.getElementById("pic-error").style.visibility = "visible";
    else addEventRequest(name, venue, desc, capacity, date, start_time, end_time, deadline, pic);
}

function resetErrorMsgs() {
    // reset error messages
    var errorMsgs = document.getElementsByClassName("error");
    for(i = 0; i < errorMsgs.length; i++) {
        errorMsgs[i].style.visibility = "hidden";
    }
}