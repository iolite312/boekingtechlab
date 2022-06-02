const input = document.querySelector('dateselecter');
const log = document.getElementById('timestamp');

input.addEventListener('change', function () {
	document.getElementById('timestamp').innerHTML = `<?php require_once $_SERVER["DOCUMENT_ROOT"] . '/php/inc/importtimes.inc.php'; ?>`;
});