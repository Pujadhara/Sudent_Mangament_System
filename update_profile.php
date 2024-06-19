<?php
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
elseif($_SESSION['usertype']== 'admin'){
  header("location: login.php");
  exit;
}

include 'partials/_dbconnect.php';
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $name= $_POST['name'];
    $croll= $_POST['croll'];
    $jroll= $_POST['jroll'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $type= $_POST['type'];
    $year= $_POST['yearOfG'];
    $course= $_POST['course'];
    $sem= $_POST['semester'];
    $image = $_FILES['image']['name'];
    $dst = "./image/".$image;
    $dst_db = "image/".$image;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $image1 = $_FILES['signature']['name'];
    $dst1 = "./signature/".$image1;
    $dst_db1 = "signature/".$image1;

    move_uploaded_file($_FILES['signature']['tmp_name'],$dst1);

    $sql ="INSERT INTO `student` (`username`, `name`, `croll`, `jroll`, `email`, `phone`, `address`, `type`, `yearOfG`, `course`, `semester`, `image`, `signature`, `dt`) VALUES ('$username', '$name', '$croll', '$jroll', '$email', '$phone', '$address', '$type', '$year', '$course', '$sem', '$dst_db', '$dst_db1', current_timestamp());";

    $result=mysqli_query($conn , $sql);

    if($result){
      header('location:update_profile.php');
    }
}

?>

<style>
.container{
    margin-left: 100px;
    margin-top: 200px;
    padding: 20px;
    background-color: seashell;
    text-align: left;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    border-radius: 10px;
}

label{
        width: 50%;
        display: inline-block;
        text-align: left;
        font-size: 20px;
        padding-top: 20px;
        padding-bottom: 10px;
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
    }
    input{
        width: 30%;
        margin-top:10px;
        height:30px;
        border: 1px solid black;
    }
    .select{
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 5px;
        width: 50%;
        border-radius: 50px;
        border: 2px solid black;
    }
    .submit{
        margin-top: 20px;
        background-color: rgb(101, 6, 116);
        color: white;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

 <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    include 'partials/student_sidebar.php';
    ?>

    <div class="container" style="max-width: 650px; margin-top: 100px; margin-bottom:90px;">
        <center>
        <h1>Student Profile</h1>
        <br><br>
            <div>
                <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                        <label>Username :</label>
                        <input type="text" name="username" class="username">
                    </div>
                    <div>
                        <label>Name :</label>
                        <input type="text" name="name" class="name">
                    </div>
                    <div>
                        <label>college Roll No :</label>
                        <input type="text" name="croll" class="croll">
                    </div>
                    <div>
                        <label>JUT Roll No :</label>
                        <input type="text" name="jroll" class="jroll">
                    </div>
                    <div>
                        <label>Email :</label>
                        <input type="email" name="email" class="email">
                    </div>
                    <div>
                        <label>Phone no :</label>
                        <input type="text" name="phone" class="phone">
                    </div>
                    <div>
                        <label>Address :</label>
                        <input type="text" name="address" class="address">
                    </div>
                    <div>
                        <label>Type :</label>
                        <select class="select" id="type" name="type">
                         <option selected>Day schola...</option>
                         <option value="day scholar">Day Scholar</option>
                        <option value="hosteller">Hosteller</option>
                     </select>
                    </div>
                    <div>
                        <label>Graduating Year :</label>
                        <select class="select" id="year" name="year">
                         <option selected>select year</option>
                         <option value="b1">2020 - 2024</option>
                         <option value="b2">2021 - 2025</option>
                         <option value="b3">2022 - 2026</option>
                         <option value="b4">2023 - 2027</option>
                         <option value="b5">2024 - 2028</option>
                     </select>
                    </div>
                    <div>
                        <label>Course : </label>
                        <select class="select" id="course" name="course">
                         <option selected>select Course</option>
                         <option value="btech cse">BTECH CSE</option>
                         <option value="btech ece">BTECH ECE</option>
                         <option value="btech ce">BTECH CE</option>
                         <option value="btech eee">BTECH EEE</option>
                         <option value="btech me">BTECH ME</option>
                         <option value="bba">BBA</option>
                         <option value="bca">BCA</option>
                         <option value="mba">MBA</option>
                         <option value="mtech">MTECH</option>
                     </select>
                    </div>
                    <div>
                        <label>Semester :</label>
                        <select class="select" id="sem" name="sem">
                         <option selected>select semester</option>
                         <option value="first">First</option>
                         <option value="second">Second</option>
                         <option value="third">Third</option>
                         <option value="fourth">Fourth</option>
                     </select>
                    </div>
                    <div>
                      <label> Upload Image : </label>
                      <input type="file" name="image">
                    </div>
                    <div>
                       <label>  Upload Signature : </label>
                       <input type="file" name="signature">
                    </div>
                    <div>
                        <input type="submit" class="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
</body>
</html>