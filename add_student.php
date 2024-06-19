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
if(isset($_POST['add_student'])){
    $username = $_POST['name'];
    $user_password= $_POST['password'];
    $usertype = "student";
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
  
    $check = "SELECT * FROM user WHERE username = '$username'";
    $check_user=mysqli_query($conn , $check);

    $row_count=mysqli_num_rows($check_user);

    if($row_count == 1){
        echo "<script type='text/javascript'>
        alert('username Already Exists. Try another one !'); </script>";
    }

    else {

    $sql ="INSERT INTO `user` (`username`, `password`,`usertype`, `email`,`phone`) VALUES ('$username', '$user_password',' $usertype ', ' $user_email', '$user_phone');";

    $result=mysqli_query($conn , $sql);
    if($result){
        echo "<script type='text/javascript'>
        alert('Data Uploadedd Successfully'); </script>";
    }
    else{
        echo "uploading failed";
    }
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
            color: white;
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        input{
            height: 20px;
            border-radius: 5px;
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

    </style>

  
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
        <H1 style="margin-bottom: 40px; margin-top:100px; ">Add student</H1>

        <div class="div_deg">

        <form action="#" method="POST">
            <div>
                <label>Username</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label>Phone no </label>
                <input type="phone" name="phone">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password">
            </div>
            <div>
                <input type="submit" class="button" name="add_student" value="Add student">
            </div>
        </form>

        </div></center>
    </div>

</body>
</html>
</body>
</html>