const homeEventTopOffset = Object.freeze($("#home-event").position().top);

$(document).scroll(() => {
    if ($(document).scrollTop() >= homeEventTopOffset) {
        $("#home-event").fadeIn(2000);
        console.log($(document).scrollTop(), homeEventTopOffset);
    }
    else $("#home-event").fadeOut();
    
})

$("#home-event").css("display", "none");

setTimeout(() => {
    $("#home-comm").fadeIn(2000);
}, 1000)