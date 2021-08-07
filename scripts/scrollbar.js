scrollShow = false;
document.addEventListener("scroll", () => {document.body.classList.remove("hidden-scrollbar")})
setInterval(()=>{
    if (scrollShow) document.body.classList.remove("hidden-scrollbar");
    else document.body.classList.add("hidden-scrollbar");
},600);