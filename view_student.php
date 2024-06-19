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


$sql="SELECT * FROM `user` WHERE usertype = 'student'";

$result = mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin1.css">

 <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

   <style>
    
    .aclickme{
        text-decoration: none;
    }
    .deleteButton{
        background-color:red;
        padding:10px 10px;
        border:none;
        border-radius:50%;
        color:white ;
        margin:5px;
    }

   </style>

</head>
<body>
<?php
   include 'partials/admin_sidebar.php';
 ?>

<div class="content">
    <center>
    <H1>Student Data </H1>
    

    <br><br>
    <table  border="1px"  >
        <tr>
            <th style="padding: 20px; font-size:20px; width:200px ;text-align:center; ">Name</th>
            <th style="padding: 20px; font-size:20px;
            width:200px ">Email</th>
            <th style="padding: 20px; font-size:20px;
            width:200px;">Password</th>
            <th style="padding: 20px; font-size:20px;
            width:200px;">Phone No</th>
            <th style="padding: 20px; font-size:20px;
            width:75px;">Delete</th>
        </tr>
       <?php

       while($info=$result->fetch_assoc()){
        ?>

        <tr>
            <td style="padding: 20px 35px;"><?php echo"{$info['username']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['email']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['password']}" ?></td>
            <td style="padding:20px 35px;"><?php echo"{$info['phone']}" ?></td>
            <td ><?php echo"<a  class='deleteButton' class ='aclickme'onClick=\" javascript:return confirm('Are you sure you want to delete this'); \" href='delete_student.php?student_id={$info['username']}'> Delete </a>" ?></td>
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