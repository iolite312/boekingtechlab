function toggleexpand(event) {
	event.target.classList.toggle("rotate180");
	event.target.parentElement.parentElement.classList.toggle("expanded");
}