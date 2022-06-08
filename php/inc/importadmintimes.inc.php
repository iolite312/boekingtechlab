<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

$days = [1 => "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag", "zondag"];


foreach ($days as $i => $day) {
	$sql = "SELECT S.`id`, S.`period`, S.`time-from`, S.`time-until`, S.`period_type` FROM schedule AS S INNER JOIN days AS D on S.day_id = D.id WHERE D.id = $i";

	if ($row = mysqli_query($conn, $sql)) {
		$result = $row;
	} else {
		$result = false;
	}

	echo "
		<div>
			<div>
				<h3>" . $day . " </h3>
				<span onclick='toggleexpand(event)' class='material-icons md-48'>expand_more</span>
			</div>
	";
	echo "
	<table class='bookings'>
		<tr>
			<th>ID</th>
			<th>periode</th>
			<th>Vanaf</th>
			<th>Tot</th>
			<th>soort periode</th>
			<th>Actie</th>
		</tr>
	";
	if (mysqli_num_rows($result) > 0) {
		//output data from every row selected and inserts it into the container
		while ($row = mysqli_fetch_assoc($result)) {
			echo "
				<tr>
					<input type='hidden' name='timeID' value=" . $row['id'] . ">
					<td>" . $row['id'] . "</td>
					<td>" . $row['period'] . "</td>
					<td>" . date("H:i", strtotime($row['time-from'])) . "</td>
					<td>" . date("H:i", strtotime($row['time-until'])) . "</td>
					<td>" . $row['period_type'] . "</td>
					<td></td>
				</tr>
			";
		}
	}
	echo "</table>";
	echo "</div>";
}


mysqli_close($conn);
