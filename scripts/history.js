function search(element) {
    var value = element.value.toUpperCase();
    var table = document.getElementById("event-table");

    //Start from 1 because 0 is table head
    for (var i = 1, count = 1; i < table.rows.length; i++) {
        var eventName = table.rows[i].cells[1].innerHTML.toUpperCase();

        if (eventName.indexOf(value) != -1 || value === "") {
            table.rows[i].style.display = "table-row";
            table.rows[i].cells[0].innerHTML = count;
            count++;
            
        } else {
            table.rows[i].style.display = "none";
        }

    }
}

window.onload = () => {
    var input = document.getElementById("event-findmember");

    input.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            var inputValue = input.value;

            window.location.href = "/wst-ldds/profile/history/"+inputValue;
        }
    });
}