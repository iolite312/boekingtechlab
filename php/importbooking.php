<?php
    //start database connection
    require_once $_SERVER["DOCUMENT_ROOT"] . '/php/db_connection.php';

    $sql = "SELECT * from bookings";

    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        //output data from every row selected and inserts it into the scoreboard container
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['tel']."</td>
                <td>".$row['organization_name']."</td>
                <td>".$row['classroompart']."</td>
                <td>".$row['material']."</td>
                <td>".$row['time']."</td>
                <td><button type='submit'>Delete</button></td>";
        }
    }
    
    
