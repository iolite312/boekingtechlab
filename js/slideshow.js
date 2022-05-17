let slideIndex = 0;
showSlides();

function showSlides(i = 0) {
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (i < slides.length) {
        slides[i].style.display = "none";
        i++;
    } else {
        i = 0;
    }

    slideIndex++;

    if (slideIndex > slides.length) { slideIndex = 1 };

    if (i < dots.length) {
        dots[i].className = dots[i].className.replace(" active", "");
        i++
    } else {
        i = 0
    }
    
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setInterval(showSlides, 1000, i); // Change image every 5 seconds
}