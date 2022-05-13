setTimeout(showSlides, 10000); // Change image every 2 seconds

function showSlides() {
    let messageContainer = document.getElementById('message-container')
    if (messageContainer) {
        messageContainer.classList.add('fade')
    }
}