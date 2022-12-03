<?php
    $databaseHost = 'localhost';
    $databaseName = 'test';
    $databaseUsername = 'root';
    
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, '', $databaseName);
    $db = new mysqli($databaseHost, $databaseUsername,'', $databaseName);

    if(!$db) {
        die("Gagal Terhubung");
    }
?>