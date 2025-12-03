<?php
    $connection = mysqli_connect("localhost", "root", "", "courses_gestion");

    if(!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>