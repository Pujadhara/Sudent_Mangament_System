<?php

session_start();

include 'partials/_dbconnect.php';

if($_GET['student_id'])
{
    $user_id = $_GET['student_id'];

    $sql="DELETE FROM user WHERE username='$user_id'";

    $result = mysqli_query($conn , $sql);

    if($result){
        header("location:view_student.php");
    }

}

?>