setTimeout(messagestimer, 5000); // Change image every 2 seconds

function messagestimer() {
	let messageContainer = document.getElementById('message-container')
	if (messageContainer) {
		messageContainer.classList.add('fade')
		setTimeout(function () { messageContainer.remove() }, 1000);
	}
}