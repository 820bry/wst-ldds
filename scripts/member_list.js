//Global variables
page = 1;
noOfRowsPerPage = 2;
sortBy = "name";
sortDirection = "asc";

//Onload, not using window.onload to prevent conflict with other js file
search(1, sortBy, sortDirection);

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
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    })
}

function deleteSelectedRow() {
    var tableRows = document.getElementById("member_list").rows;
    var studentID = [];

    //1st row is table head, so iterate from 2nd row
    for (i = 1; i < tableRows.length; i++) {
        //Remove if the checkbox is checked
        var checkboxRow = tableRows[i].firstElementChild.firstElementChild;

        if (checkboxRow.classList.contains("is-checked")) {
            studentID.push(tableRows[i].children[2].innerHTML);
            tableRows[i].remove();
            i--;
        }
    }

    deleteRowRequest(studentID);
}

function deleteRow(element) {
    var tableRows = document.getElementById("member_list").rows;
    var studentID = [];

    for (i = 1; i < tableRows.length; i++) {
        if (tableRows[i].contains(element)) {
            studentID.push(tableRows[i].children[2].innerHTML);
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
                document.getElementById("page-count").innerHTML = `${noOfPage} of ${Math.ceil(resultsArray.length / noOfRowsPerPage)}`;

                //Previous page button update
                if (page > 1 && resultsArray.length < ((page*noOfRowsPerPage)+1)) {
                    document.getElementById("prev").disabled = false;
                } else {
                    document.getElementById("prev").disabled = true;
                    document.getElementById("prev-tooltip").classList.remove("is-active");
                }

                //Next page button update
                if (((page)*noOfRowsPerPage) < resultsArray.length) {
                    document.getElementById("next").disabled = false;
                } else {
                    document.getElementById("next").disabled = true;
                    document.getElementById("next-tooltip").classList.remove("is-active");
                }

                for (i = (page-1)*noOfRowsPerPage; i < resultsArray.length && i < (page * noOfRowsPerPage);i++) {
                    var checked = (resultsArray[i].permission_level === 0) ? "" : "checked";
                    var rowHTML = `<tr class="edit_color">
                        <td class = "chckbox"><label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-${no}"><input type="checkbox" id="checkbox-${no}" class="mdl-checkbox__input"></label></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].name}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].student_id}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].faculty}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].course_code}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].ic_no}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].email}" disabled></input></td>
                        <td><input type="text" id="invi_edit" class="invi_edit" value="${resultsArray[i].phone_no}" disabled></input></td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="edit${no}"><i class="material-icons">edit</i></button>
                            <div class="mdl-tooltip" for="edit${no}">Edit</div>
                        </td>
                        <td>
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="delete${no}" onclick="deleteRow(this)"><i class="material-icons">delete</i></button>
                            <div class="mdl-tooltip" for="delete${no}">Delete</div>
                        </td>
                        <td>
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-${no}">
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