<?php
//start database connection
require_once $_SERVER["DOCUMENT_ROOT"] . '/database/db_connection.php';

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    //output data from every row selected and inserts it into the container
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <form action='/php/removeaccount.php' method='post'>
                <tr>
                    <input type='hidden' name='accountID' value=" . $row['id'] . ">
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['firstname'],  $row['lastname'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td><input class='button' type='submit' name='submit' value='Verwijderen'></td> 
                </tr>
            </form>
        ";
    }
}

mysqli_close($conn);
