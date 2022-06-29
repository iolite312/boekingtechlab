<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/php/function.php';

$result = fetchbooking($result);

if (mysqli_num_rows($result) > 0) {
	//output data from every row selected and inserts it into the container
	while ($row = mysqli_fetch_assoc($result)) {
		echo "
            <form action='/php/removebooking.php' method='post'>
                <tr>
                    <input type='hidden' name='bookingID' value=" . $row['id'] . ">
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['tel'] . "</td>
                    <td>" . $row['organization'] . "</td>
                    <td>" . $row['period'] . "</td>
                    <td>" . $row['period'] . "</td>
                    <td>" . $row['period'] . "</td>
                    <td>" . $row['room'] . "</td>
                    <td><input class='button' type='submit' name='submit' value='Verwijderen'></td> 
                </tr>
            </form>
        ";
	}
}

mysqli_close($conn);
