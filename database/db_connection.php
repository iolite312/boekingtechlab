<?php    
    $servername = 'localhost';

    $config = parse_ini_file($_SERVER["DOCUMENT_ROOT"]. '/database/dbConn.ini')

    $conn = mysqli_connect($servername, $config['username'], $config['password'], $config['db']);
    //check that connection happend
    if(mysqli_connect_errno())
    {
        echo "1: Connection Failed"; //error code #1 - connection failed
        exit();
    }
?>