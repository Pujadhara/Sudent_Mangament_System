<?php

session_start();

include 'partials/_dbconnect.php';

if($_GET['course_id'])
{
    $c_id = $_GET['course_id'];

    $sql="DELETE FROM course WHERE name='$c_id'";

    $result = mysqli_query($conn , $sql);

    if($result){
        header("location:view_course.php");
    }

}

?>