<?php
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
elseif($_SESSION['usertype']== 'student'){
    header("location: login.php");
    exit;
}

include 'partials/_dbconnect.php';


$sql="SELECT * FROM `course`";

$result = mysqli_query($conn,$sql);
?>

<style>
    td{
        background-color:skyblue;
    }
    .aclickme{
        text-decoration: none;
    }
    .updateButton{
        background-color:green;
        padding:10px 10px;
        border:none;
        border-radius:50%;
        color:white ;
        margin:5px;
    }

   </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

 <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</head>
<body>
<?php
   include 'partials/admin_sidebar.php';
 ?>

<div class="content">
    <center>
    <H1>Update Course</H1>
    

    <br><br>
    <table  border="1px"  >
        <tr>
            <th style="padding: 20px; font-size:15px; width:200px ;text-align:center; ">Course Name</th>
            <th style="padding: 20px; font-size:15px;
            width:200px ">Duration</th>
            <th style="padding: 20px; font-size:15px;
            width:200px;">Fee Structure</th>
            <th style="padding: 20px; font-size:15px;
            width:200px;">About Course</th>
            <th style="padding: 20px; font-size:15px;
            width:75px;">Update</th>
        </tr>
       <?php

       while($info=$result->fetch_assoc()){
        ?>

        <tr>
            <td style="padding: 20px 35px;"><?php echo"{$info['name']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['duration']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['fee']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['about']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"<a class = 'updateButton' onClick=\" javascript:return confirm('Are you sure you want to update this'); \" href='update_course1.php?course_id={$info['name']}'> Update </a>" ?></td>
        </tr>
        <?php
       }
       ?>
      
    </table>
</center>
    </div>

</body>
</html>
</body>
</html>