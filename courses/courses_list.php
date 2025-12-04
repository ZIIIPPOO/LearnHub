<?php
    require_once '../header.php'; 
    $sql = "SELECT * FROM courses;";
    $result = mysqli_query($connection, $sql)
?>