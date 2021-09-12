function search(element) {
    var value = element.value.toUpperCase();
    var table = document.getElementById("event-table");

    //Start from 1 because 0 is table head
    for (var i = 1; i < table.rows.length; i++) {
        var eventName = table.rows[i].cells[1].innerHTML.toUpperCase();

        if (eventName.indexOf(value) != -1 || value === "") {
            table.rows[i].style.display = "table-row";
            
        } else {
            table.rows[i].style.display = "none";
        }

    }
}