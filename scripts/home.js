$(document).scroll(() => {
    if ($(document).scrollTop() >= 670) {
        $("#home-event").fadeIn(2000);
    }
    else $("#home-event").fadeOut();
    
})

setTimeout(() => {
    $("#home-comm").fadeIn(2000);
}, 1000)