var currSlide = 1;

var slides = document.getElementsByClassName("carousel-item");
var indicators = document.getElementsByClassName("dot");

window.onload = function() {
    display(currSlide);
};

// generate carousel page indicator
function generateIndicator() {
    for(var i = 0; i < slides.length; i++) {
        document.write("<span class=\"dot\" onclick=\"display(" + (i + 1) +")\"></span>");
    }
}

// advance forward/backward slide
function advance(n) {
    display(currSlide += n);
}

// show specific slide
function display(n) {
    
    // input is past slides.length (past last slide); resets to 1st slide
    if(n > slides.length) {
        n = 1;
    }

    // input is negative (past first slide); goes to last slide
    if(n < 1) {
        n = slides.length;
    }

    // re-adjust input value (array starts from 0)
    currSlide = n;

    // reset all first
    for(var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        indicators[i].className = indicators[i].className.replace(" active", "");
    }

    // display currSlide
    slides[currSlide - 1].style.display = "block";
    indicators[currSlide - 1].className += " active";
}