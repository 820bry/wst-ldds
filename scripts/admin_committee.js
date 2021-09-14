function update(element) {
    var value = element.value;
    var position = element.parentElement.nextElementSibling.innerHTML;
    var snackbarContainer = document.querySelector('#snackbar');

    fetch("/wst-ldds/admin_committee/editCommittee.php?studentID="+value+"&position="+position)
    .then(response => response.text())
    .then ((response) => {
        if (response === "Success") {
            var data = {message: 'Position updated'};
            snackbarContainer.MaterialSnackbar.showSnackbar(data);
        }
    })
}

function search(element) {
    var value = element.value.toUpperCase();
    var tableRows = document.getElementsByClassName("color_edit");

    for (var i = 0; i < tableRows.length; i++) {
        if (tableRows[i].children[1].innerHTML.toUpperCase().indexOf(value) != -1) {
            tableRows[i].style.display = "table-row";
        } else {
            tableRows[i].style.display = "none";
        }
    }

}