function search(searchElement) {
    var eventBoxes = document.getElementsByClassName("event-box");
    var searchValue = searchElement.value.toUpperCase();

    for (var i = 0; i < eventBoxes.length; i++) {
        if ((eventBoxes[i].firstElementChild.innerHTML.toUpperCase().indexOf(searchValue)) == -1) {
            eventBoxes[i].style.display = "none";
        } else {
            eventBoxes[i].style.display = "inline";
        }
    }
}