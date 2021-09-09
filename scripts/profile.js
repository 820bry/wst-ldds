function toggleEdit() {
    $("#button_info").toggle();
    $("#pfp").toggle();
    $("input#user_info").prop("disabled", !$("#user_info").prop("disabled"));
    
}