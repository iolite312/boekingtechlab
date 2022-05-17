let slideIndex = 0;
var t;
showSlides();

function showSlides(i = 0) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
    }

    slideIndex + i;
    slideIndex++;

    if (slideIndex > slides.length) { slideIndex = 1 };

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    } 
    
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    t = setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function manualSlide(movement = 0) {
    clearTimeout(t)
    showSlides(movement)
}