<?php 

    $host = 'localhost';
    $name = 'catatan_pemweb';
    $user = 'root';
    $pass = '';

    // $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

    // Create connection
    $mysqli = new mysqli($host, $user, $pass, $name);

?>