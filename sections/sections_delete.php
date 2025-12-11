<?php
    require_once '../config.php';

    $course_id = $_GET['course_id'];
    $id = $_GET['id'];

    $sql = "DELETE FROM sections WHERE course_id = $course_id AND id = $id";
    mysqli_query($connection, $sql);
    header("Location: ../index.php");

