const anonymousDropdown = document.getElementById("anonymous");
const memberDropdown = document.getElementById("member");
const adminDropdown = document.getElementById("admin");

userType = "admin";

window.onload = () => {
    //Reset the dropdowns
    anonymousDropdown.style.display = "none";
    memberDropdown.style.display = "none";
    adminDropdown.style.display = "none";

    if (userType.toUpperCase() === "ANONYMOUS") {
        anonymousDropdown.style.display = "block";
    } else if (userType.toUpperCase() === "USER") {
        memberDropdown.style.display = "block";
    } else if (userType.toUpperCase() === "ADMIN") {
        adminDropdown.style.display = "block";
    }
}