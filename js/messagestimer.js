showSlides();

function showSlides() {
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    let messageContainer = document.getElementById('message-container')
    messageContainer.classList.add('fade')

}