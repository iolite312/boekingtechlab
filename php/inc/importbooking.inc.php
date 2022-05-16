<?php
//start database connection
require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

$sql = "SELECT * FROM bookings";

$result = mysqli_query($conn, $sql);

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
                    <td>" . $row['organization_name'] . "</td>
                    <td>" . $row['classroompart'] . "</td>
                    <td>" . $row['material'] . "</td>
                    <td>" . $row['time'] . "</td>
                    <td><input class='button' type='submit' name='submit' value='Delete'></td> 
                </tr>
            </form>
        ";
    }
}

mysqli_close($conn);
