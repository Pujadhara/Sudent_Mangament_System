<?php 
include 'partials/_dbconnect.php';
$id=$_GET['student_id'];

$sql="SELECT * FROM `user` WHERE username = '$id' ";

$result = mysqli_query($conn,$sql);

$info=$result->fetch_assoc();


if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];


    $query="UPDATE user SET username = '$name' , email='$email', phone = '$phone' ,password = '$password' WHERE username = '$id'";

    $result2 = mysqli_query($conn,$query);

    if($result2)
    {
        header("location:update_student.php");
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
        <H1>update student</H1>

        <div class="div_deg">

        <form action="#" method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="name" value="<?php echo "{$info['username']}"  ?>">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo "{$info['email']}"  ?>">
            </div>
            <div>
                <label>Phone No</label>
                <input name="phone" value="<?php echo "{$info['phone']}"  ?>">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password" value="<?php echo "{$info['password']}"  ?>">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="update" value="Update">
            </div>
        </form>

        </div></center>
    </div>

</body>
</html>
</body>
</html>