<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

$result = fetchbooking($result);

if (mysqli_num_rows($result) > 0) {
	//output data from every row selected and inserts it into the container
	$id = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$id++;
		echo "
            <form action='/php/removebooking.php' method='post'>
                <tr>
                    <input type='hidden' name='bookingID' value=" . $row['id'] . ">
                    <td>" . $id . "</td>
                    <td>" . $row['classroompart'] . "</td>
                    <td>" . $row['material'] . "</td>
                    <td>" . $row['time'] . "</td>
                    <td><input class='button' type='submit' name='submit' value='Verwijderen'></td> 
                </tr>
            </form>
        ";
	}
} else {
	echo "U hebt geen boekingen op dit moment";
}
