function checkAllBox(element) {
    var tableBody = element.parentElement.parentElement.parentElement.parentElement.nextElementSibling;
    var rows =  tableBody.getElementsByTagName("tr");

    for (i = 0; i < rows.length; i++) {
        var checkboxRow = rows[i].firstElementChild.firstElementChild;

        if (element.checked) {
            checkboxRow.classList.add("is-checked");
        } else {
            checkboxRow.classList.remove("is-checked");
        }        
    }
}

function deleteSelectedRow() {
    var tableRows = document.getElementById("member_list").children[1].getElementsByTagName("tr");

    for (i = 0; i < tableRows.length; i++) {
        if (tableRows[i].firstElementChild.firstElementChild.classList.contains("is-checked")) {
            tableRows[i].remove();
            i--;
        }
    }
}

function deleteRow(element) {
    element.parentElement.parentElement.remove();
}

document.getElementById("searchbar").addEventListener("input", () => {
    var tableBody = document.getElementById("member_list").children[1];
    var tableRows = tableBody.getElementsByTagName("tr");
    var noOfRows = tableRows.length;
    var inputValue = document.getElementById("searchbar").value;

    for (i = 0; i < noOfRows; i++) {
        console.log(i, tableRows.length);
        if (tableRows[i].children[1].innerHTML.toUpperCase().indexOf(inputValue.toUpperCase()) == -1 ) {
            tableRows[i].style.display = "none";
        } else {
            tableRows[i].style.display = "";
        }
    }
})


