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
if(isset($_POST['add_course'])){

    $c_name = $_POST['name'];
    $c_duration= $_POST['duration'];
    $c_fee= $_POST['fee'];
    $c_about= $_POST['about'];
    
    $sql ="INSERT INTO `course` (`name`, `duration`,`fee`, `about`) VALUES ('$c_name', '$c_duration',' $c_fee', '$c_about');";

    $result=mysqli_query($conn , $sql);

    if($result){
      header('location:add_course.php');
    }
}

?>

<style type="text/css">

label{
            color: white;
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        input{
            height: 30px;
        }
        .div_deg{
            background-color:   rgb(135, 60, 116);
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
            box-shadow: 0 0 15px black;
        }
        .button{
            background-color: lightcoral;
            border-radius: 5px;
            padding: 5px;
            margin-top: 20px;
            width: 100px;
            height: 40px;
            font-size: 15px;
        }
        .button:hover{
            background-color: lightgray;
          }
          textarea{
            margin-top: 9px;
          }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
        <H1 style="margin-bottom: 40px; margin-top:100px; ">Add Course</H1>
        <div class="div_deg">

        <form action="#" method="POST">

        <div>
            <label>Course Name</label>
            <input type="text" name="name" class="name">
        </div>
        <div>
            <label>Course Duration</label>
            <input type="text" name="duration" class="duration">
        </div>
        <div>
            <label>Fee Structure</label>
            <input type="text" name="fee" class="fee">
        </div>
        <div>
            <label>About</label>
            <textarea name="about"></textarea>
        </div>
        <div>
        <input type="submit" class="button" name="add_course" value="Add Course">
        </div>

        </form>
        </center>
        </div>
       
    </div>

</body>
</html>
</body>
</html>