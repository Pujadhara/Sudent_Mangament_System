<?php

session_start();

include 'partials/_dbconnect.php';

if($_GET['teacher_id'])
{
    $user_id = $_GET['teacher_id'];

    $sql="DELETE FROM teacher WHERE sno='$user_id'";

    $result = mysqli_query($conn , $sql);

    if($result){
        header("location:view_teacher.php");
    }

}

?>