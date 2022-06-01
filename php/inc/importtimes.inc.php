<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

$result = fetchtimes($result);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$row['period_type'] == 0 ? $period_type = 'lesson' : $period_type = 'break';
		// <input type='checkbox' period_type='" . $period_type . "' id='" . $row['id'] . "' name='box1' value='' style='input:checked{background-color: red;}'>
		echo "
			<article class='container'>
				<input type='checkbox'>
				<div>

				</div>
			</article>
        ";
	}
} else {
	echo "U hebt geen boekingen op dit moment";
}
