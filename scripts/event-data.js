loadParticipants();

function loadParticipants() {

    var searchQuery = document.getElementById('searchbar').value;
    var tbody = document.getElementById('participant-list').children[1];

    fetch(`/wst-ldds/event_list/search_participants.php?value=${searchQuery}&eventID=${eventID}`)
    .then(response => response.json())
    .then((varResponse) => {
        if(varResponse.status === "success") {
            // clear list
            tbody.innerHTML = "";

            if(!varResponse.empty) {
                var results = varResponse.results;

                for(i = 0; i < results.length; i++) {
                    var rowHTML = `
                    <tr class="data-row">
                        <td>${results[i].name}</td>
                        <td>${results[i].student_id}</td>
                        <td>${results[i].register_date}</td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="delete${i}" onclick="deleteParticipant(this, ${results[i].registration_id})"><i class="material-icons">delete</i></button>
                            <div class="mdl-tooltip" for="delete${i}">Delete</div>
                        </td>
                    </tr>
                    `;
                    tbody.innerHTML += rowHTML;
                }
            } 
        } else {
            alert("There is some problem retrieving participant's name list at the moment. Please try again later.");
        }
    })
    .then(() => {
        var noOfRows = document.getElementById('participant-list').rows.length;

        for(i = 1; i < noOfRows; i++) {
            var row = document.getElementById('participant-list').rows[i];
            componentHandler.upgradeElement(row.children[3].children[0]);
            componentHandler.upgradeElement(row.children[3].children[1]);
        }
    })
    .catch((error) => {
        console.log("Error: ", error);
    })

}

function deleteParticipant(element, registrationID) {
    var tableRows = document.getElementById('participant-list').rows;
    
    for(i = 1; i < tableRows.length; i++) {
        if(tableRows[i].contains(element)) {
            tableRows[i].remove();
        }
    }

    var deleteDetails = {
        "registrationID" : registrationID
    };
    var deleteJSON = JSON.stringify(deleteDetails);

    fetch("/wst-ldds/event_list/delete_participant.php", {
        method: "POST",
        headers: {
            "Content-type" : "application/json",
        },
        body : deleteJSON
    })
    .then(response => response.json())
    .then((varResponse) => {
        if(varResponse.status === "success") {
            loadParticipants();
        } else {
            alert("Failed to delete participant.");
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })

}

function editEvent() {
    
    var name = document.getElementById("new_name").value;
    var venue = document.getElementById("new_venue").value;
    var desc = document.getElementById("new_desc").value;
    var capacity = document.getElementById("new_capacity").value;
    var date = document.getElementById("new_date").value;
    var start_time = document.getElementById("new_start_time").value;
    var end_time = document.getElementById("new_end_time").value;
    var deadline = document.getElementById("new_deadline").value;
    var pic = document.getElementById("new_pic").value;

    var eventDetails = {
        "id" : eventID,
        "name" : name,
        "venue" : venue,
        "desc" : desc,
        "capacity" : capacity,
        "date" : date,
        "start_time" : start_time,
        "end_time" : end_time,
        "deadline" : deadline,
        "pic" : pic
    };

    var editJSON = JSON.stringify(eventDetails);

    fetch("/wst-ldds/event_list/edit-backend.php", {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: editJSON
    })
    .then(response => response.json())
    .then((varResponse) => {
        if(varResponse.status === "Success") {
            location.href = "/wst-ldds/event_list";
        } else {
            alert("Error when editing event");
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })

}