<?php
// <input type='checkbox' period_type='" . $period_type . "' id='" . $row['id'] . "' name='box1' value='' style='input:checked{background-color: red;}'>

require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';


$dayofweek = date('N', strtotime('02-12-2020'));
$sql = "SELECT * FROM `schedule`AS S INNER JOIN `days` AS D on S.day_id = D.id WHERE D.id = $dayofweek";

if ($row = mysqli_query($conn, $sql)) {
	$result = $row;
} else {
	$result = false;
}

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "
			<article class='container'>
				<input type='checkbox'>
				<div>
					<h3>" . $row['name'] . "</h3>
					<p>" . $row['period'] . "</p>
					<p>From: " . $row['time-from'] . "</p>
					<p>From: " . $row['time-until'] . "</p>
				</div>
			</article>
        ";
	}
}

mysqli_close($conn);
