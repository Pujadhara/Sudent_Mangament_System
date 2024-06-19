<?php 
include 'partials/_dbconnect.php';
$id=$_GET['course_id'];

$sql="SELECT * FROM `course` ";

$result = mysqli_query($conn,$sql);

$info=$result->fetch_assoc();


if(isset($_POST['update_course'])){
    $c_name = $_POST['name'];
    $c_duration= $_POST['duration'];
    $c_fee= $_POST['fee'];
    $c_about= $_POST['about'];

    $query="UPDATE course SET name = '$c_name' , duration='$c_duration', fee = '$c_fee', about = '$c_about' WHERE name = '$id'";

    $result2 = mysqli_query($conn,$query);

    if($result2)
    {
        header("location:update_course.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">


    <style type="text/css">

        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

    </style>

  
 <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<?php
   include 'partials/admin_sidebar.php';
 ?>

    <div class="content">
        <center>
        <H1>update course</H1>

        <div class="div_deg">

        <form action="#" method="POST">

        <div>
            <label>Course Name</label>
            <input type="text" name="name" class="name" value="<?php echo "{$info['name']}"  ?>">
        </div>
        <div>
            <label>Course Duration</label>
            <input type="text" name="duration" class="duration" value="<?php echo "{$info['duration']}"  ?>">
        </div>
        <div>
            <label>Fee Structure</label>
            <input type="text" name="fee" class="fee" value="<?php echo "{$info['fee']}"  ?>">
        </div>
        <div>
            <label>About</label>
            <textarea name="about" ><?php echo "{$info['about']}"  ?></textarea>
        </div>
        <div>
        <input type="submit" class="btn btn-primary" name="update_course" value="Update Course">
        </div>

        </form>

        </div></center>
    </div>

</body>
</html>
</body>
</html>