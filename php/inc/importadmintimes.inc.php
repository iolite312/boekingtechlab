<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

$result = fetchadmintimes($result);

$days = [ 1 => "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag", "zondag"];
$i = 0;
if (mysqli_num_rows($result) > 0) {
	//output data from every row selected and inserts it into the container
	while ($row = mysqli_fetch_assoc($result)) {
		echo "
            <h3>" . $days[$i] . " </h3>
            <form action='' method='post'>
                <tr>
                    <input type='hidden' name='bookingID' value=" . $row['id'] . ">
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['period'] . "</td>
                    <td>" . date("H:i", strtotime($row['time-from'])) . "</td>
                    <td>" . date("H:i", strtotime($row['time-until'])) . "</td>
                    <td>" . $row['period_type'] . "</td>
                    <td></td>
                </tr>
            </form>
        ";
        $i++;
	}
}

mysqli_close($conn);
