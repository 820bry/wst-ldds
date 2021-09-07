//Global variables
page = 1;
noOfRowsPerPage = 1;
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
    var tableRows = document.getElementById("member_list").rows;

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

function deleteRowRequest(studentIDs) {
    var deleteDetails = {
        "studentID": studentIDs
    };

    var deleteJSON = JSON.stringify(deleteDetails);

    fetch("/wst-ldds/member_list/delete.php", {
        method: "POST",
        headers: {
            "Content-type":"application/json",
        },
        body: deleteJSON,
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
    var tableRows = document.getElementById("member_list").rows;
    var studentID = [];
    var noOfCheckedRows = 0;

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        //Remove if the checkbox is checked
        var checkboxRow = tableRows[i].firstElementChild.firstElementChild;

        if (checkboxRow.classList.contains("is-checked")) {
            studentID.push(tableRows[i].children[2].firstElementChild.value);
            tableRows[i].remove();
            noOfCheckedRows++;
            i--;
        }
    }

    //If no rows selected, notify user
    if (noOfCheckedRows == 0) {
        notificationMsg("No rows selected");
    } else {
        deleteRowRequest(studentID);
    }

    
}

function deleteRow(element) {
    var tableRows = document.getElementById("member_list").rows;
    var studentID = [];

    for (i = 1; i < tableRows.length; i++) {
        if (tableRows[i].contains(element)) {
            studentID.push(tableRows[i].children[2].firstElementChild.value);
            tableRows[i].remove();
        }
    }

    deleteRowRequest(studentID);
}

function clearTable() {
    var tableBody = document.getElementById("member_list").children[1];
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

    //Fix category value according to database table
    if (category === "course") category = "course_code";
    if (category === "nric") category = "ic_no";

    fetch(`/wst-ldds/member_list/search.php?value=${searchValue}&category=${category}&sortBy=${sortBy}&sortDirection=${sortDirection}`)
    .then(response => response.json())
    .then((varResponse) => {
        if (varResponse.status === "success") {
            clearTable();

            if (!varResponse.empty) {
                //Results returned are not empty
                var tableBody = document.getElementById("member_list").children[1];
                var no = 1;
                var resultsArray = varResponse.results;

                if (page > 1 && resultsArray.length < ((page-1)*noOfRowsPerPage)+1) {
                    //Page no more than 1 but there isn't anything to show, reduce page by 1
                    search(noOfPage-1, sortBy, sortDirection);
                    return;
                }

                //Page update
                document.getElementById("page-count").innerHTML = `${(page-1)*noOfRowsPerPage+1}-${(page * noOfRowsPerPage)} of ${resultsArray.length}`;

                //Previous page button update
                if (page > 1 && resultsArray.length < ((page*noOfRowsPerPage)+1)) {
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
                    var rowHTML = `<tr class="edit_color">
                        <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-${no}"><input type="checkbox" id="checkbox-${no}" class="mdl-checkbox__input"></label></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].name}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].student_id}" disabled></input></td>
                        <td class="col_small"><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].faculty}" disabled></input></td>
                        <td class="col_small"><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].course_code}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].ic_no}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].email}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].phone_no}" disabled></input></td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}" onclick="editButton(this)"><i class="material-icons">edit</i></button>
                            <div class="mdl-tooltip" for="edit${no}">Edit</div>
                        </td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="delete${no}" onclick="deleteRow(this)"><i class="material-icons">delete</i></button>
                            <div class="mdl-tooltip" for="delete${no}">Delete</div>
                        </td>
                        <td>
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-${no}" onchange="editAdmin(this)">
                        <input type="checkbox" id="switch-${no}" class="mdl-switch__input" ${checked}>
                        <span class="mdl-switch__label"></span></label>
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
        var noOfRows = document.getElementById("member_list").rows.length;

        for (i = 1; i < noOfRows; i++) {
            var row = document.getElementById("member_list").rows[i];
            componentHandler.upgradeElement(row.children[0].children[0]);
            componentHandler.upgradeElement(row.children[8].children[0]);
            componentHandler.upgradeElement(row.children[8].children[1]);
            componentHandler.upgradeElement(row.children[9].children[0]);
            componentHandler.upgradeElement(row.children[9].children[1]);
            componentHandler.upgradeElement(row.children[10].children[0]);
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

    if (sortByValue === "Student ID") sortByValue = "student_id";
    else if (sortByValue === "Course") sortByValue = "course_code";
    else if (sortByValue === "NRIC") sortByValue = "ic_no";
    else if (sortByValue === "Phone Number") sortByValue = "phone_no";
    else if (sortByValue === "Admin") sortByValue = "permission_level";

    search(1, sortByValue, sortDirection);
}

function editButton(button) {
    var tableRows = document.getElementById("member_list").rows;
    var no = button.id.replace("edit", "");

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        // If this is the row that contains the button clicked
        if (tableRows[i].contains(button)) {
            var editTd = tableRows[i].children[8];
            // Change the button to tick and cancel
            editTd.innerHTML = `
                <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="done${no}" onclick="doneEdit(this)"><i class="material-icons">done</i></button>
                <div class="mdl-tooltip" for="done${no}">Done</div>
                <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="close${no}" onclick="cancelEdit(this)"><i class="material-icons">close</i></button>
                <div class="mdl-tooltip" for="close${no}">Cancel</div>
            `;

            //MDL upgrade the elements in the td to make it works
            for (x = 0; x < editTd.children.length; x++) {
                componentHandler.upgradeElement(editTd.children[x]);
            }

            //Enable the input (2nd td to 7th td are the inputs, using for loop to simplify things)
            //Then, insert the row values for cancel/undo purpose
            var tdValues = [tableRows[i]]; //Store the row into it, so can be used to find the edited row later
            for (x = 1; x <= 7; x++) {
                var inputElement = tableRows[i].children[x].firstElementChild;

                inputElement.disabled = false;

                tdValues.push(inputElement.value);
            }

            //Save tdValues array into rowItems
            rowItems.push(tdValues);
            
        }
    }
}

function cancelEdit(button) {
    var tableRows = document.getElementById("member_list").rows;
    var no = button.id.replace("close", "");

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        // If this is the row that contains the button clicked
        if (tableRows[i].contains(button)) {
            var editTd = tableRows[i].children[8];
            // Change the button back to edit button
            editTd.innerHTML = `
                <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}" onclick="editButton(this)"><i class="material-icons">edit</i></button>
                <div class="mdl-tooltip" for="edit${no}">Edit</div>
            `;

            //MDL upgrade the elements in the td to make it works
            for (x = 0; x < editTd.children.length; x++) {
                componentHandler.upgradeElement(editTd.children[x]);
            }

            //Insert back the original values and disable the input
            //First, loop through the rowItems array and find the corresponding subarray
            for (x = 0; x < rowItems.length; x++) {
                if (tableRows[i].contains(rowItems[x][0])) {
                    for (z = 1; z <= 7; z++) {
                        var inputElement = tableRows[i].children[z].firstElementChild;

                        inputElement.disabled = true;

                        //Insert back the original values
                        inputElement.value = rowItems[x][z];
                    }
                    rowItems.splice(x,1);
                    break;
                }
            }
        }
    }
}

function doneEdit(button) {
    var tableRows = document.getElementById("member_list").rows;
    var no = button.id.replace("done", "");

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        // If this is the row that contains the button clicked
        if (tableRows[i].contains(button)) {
            var editTd = tableRows[i].children[8];
            // Change the button back to edit button
            editTd.innerHTML = `
                <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}" onclick="editButton(this)"><i class="material-icons">edit</i></button>
                <div class="mdl-tooltip" for="edit${no}">Edit</div>
            `;

            //MDL upgrade the elements in the td to make it works
            for (x = 0; x < editTd.children.length; x++) {
                componentHandler.upgradeElement(editTd.children[x]);
            }

            //Disable the input
            for (x = 1; x <= 7; x++) {
                var inputElement = tableRows[i].children[x].firstElementChild;

                inputElement.disabled = true;
            }

            //Remove from database
            var editDetails = {};

            //Loop through rowItems and get the originalID
            for (x = 0; x < rowItems.length; x++) {
                if (tableRows[i].contains(rowItems[x][0])) {
                    editDetails["originalID"] = rowItems[x][2];
                }
            }

            //Insert new values into array
            editDetails["name"] = tableRows[i].children[1].firstElementChild.value;
            editDetails["studentID"] = tableRows[i].children[2].firstElementChild.value;
            editDetails["faculty"] = tableRows[i].children[3].firstElementChild.value;
            editDetails["courseCode"] = tableRows[i].children[4].firstElementChild.value;
            editDetails["icNo"] = tableRows[i].children[5].firstElementChild.value;
            editDetails["email"] = tableRows[i].children[6].firstElementChild.value;
            editDetails["phoneNumber"] = tableRows[i].children[7].firstElementChild.value;

            var editJSON = JSON.stringify(editDetails);

            fetch("/wst-ldds/member_list/edit.php", {
                method: "POST",
                headers: {
                    "Content-type":"application/json",
                },
                body: editJSON,
            })
            .then(response => response.json())
            .then((varResponse) => {
                if (varResponse.status === "Success") {
                    //Display message
                    notificationMsg("Updated successfully");

                    //Loop through rowItems and remove the original values from array
                    for (x = 0; x < rowItems.length; x++) {
                        if (tableRows[i].contains(rowItems[x][0])) {
                            rowItems.splice(x,1);
                        }
                    }
                } else {
                    //Display message
                    notificationMsg("Error occured. Please try again later.");

                    //Fail to edit, insert back the original values
                    for (x = 0; x < rowItems.length; x++) {
                        if (tableRows[i].contains(rowItems[x][0])) {
                            for (z = 1; z <= 7; z++) {
                                var inputElement = tableRows[i].children[z].firstElementChild;
        
                                //Insert back the original values
                                inputElement.value = rowItems[x][z];
                            }
                            rowItems.splice(x,1);
                            break;
                        }
                    }
                }
            })
            .catch((error) => {
                console.error("Error: ", error);
            })
        }
    }
}

function editAdmin(toggle) {
    var tableRows = document.getElementById("member_list").rows;
    var editDetails = {};

    if (toggle.classList.contains("is-checked")) {
        editDetails['permission_level'] = 1;
    } else {
        editDetails['permission_level'] = 0;
    }

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        // If this is the row that contains the toggle clicked
        if (tableRows[i].contains(toggle)) {
            //Check rowItems to get original ID, in case edit button is clicked and didn't done yet
            //Loop through rowItems and get the originalID
            for (x = 0; x < rowItems.length; x++) {
                if (tableRows[i].contains(rowItems[x][0])) {
                    editDetails["studentID"] = rowItems[x][2];
                }
            }

            //Get value from input if rowItems doesn't contain the ID
            if (editDetails["studentID"] == null) {
                editDetails["studentID"] = tableRows[i].children[2].firstElementChild.value;
            }

            var editJSON = JSON.stringify(editDetails);

            //Proceed to edit admin
            fetch("/wst-ldds/member_list/updateAdmin.php", {
                method: "POST",
                headers: {
                    "Content-type":"application/json",
                },
                body: editJSON,
            })
            .then(response => response.json())
            .then((varResponse) => {
                if (varResponse.status === "Success") {
                    //Display message
                    notificationMsg("Updated successfully");
                } else {
                    //Fail to edit, alert user
                    //Didn't refresh table to prevent interrupting user edit
                    notificationMsg("Error occured. Please try again later.");
                    
                    //Reverse the toggle
                    if (editDetails['permission_level'] == 1) {
                        toggle.classList.remove("is-checked");
                    } else {
                        toggle.classList.add("is-checked");
                    }
                }
            })
            .catch((error) => {
                console.error("Error: ", error);
            })
        }
    }
}