<?php
    require_once '../config.php';

    $course_id = $_GET['id'];
    $sql = "DELETE FROM courses WHERE id = $course_id";
    mysqli_query($connection, $sql);
    header("Location: ../index.php");     
    exit();
