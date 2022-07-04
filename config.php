<?php 

    $host = 'localhost';
    $name = 'catatan_pemweb';
    $user = 'root';
    $pass = '';

    // $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

    // Create connection
    $mysqli = new mysqli($host, $user, $pass, $name);
    
    if (mysqli_connect_error()) {
        echo "Connection Failed: ".mysqli_connect_error();
    }

?>
