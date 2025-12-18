<?php
    session_start();
    require_once '../config.php';
    
    $course_id = $_GET['course_id'];
    $user_id = $_SESSION['user_id'];

    // echo $course_id;  
    // echo $user_id;

    $sql = "SELECT * FROM enrollments WHERE course_id = $course_id and user_id = $user_id";
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result))
    
    require_once '../header.php';
?>


<?php require_once '../footer.php'; ?>