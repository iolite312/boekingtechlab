showSlides();

function showSlides() {
    setTimeout(showSlides, 10000); // Change image every 2 seconds
    let messageContainer = document.getElementById('message-container')
    if (messageContainer) {
        messageContainer.classList.add('fade')
        print(1)
    } else {
        print(1)
    }

}