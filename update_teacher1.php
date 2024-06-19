<?php 
include 'partials/_dbconnect.php';

if(isset($_GET['teacher_sno'])) {
  $t_sno = $_GET['teacher_sno'];


$sql = "SELECT * FROM teacher WHERE sno = '$t_sno'";
$result = mysqli_query($conn, $sql);
$info = $result->fetch_assoc();
}

if(isset($_POST['update_teacher'])) {
$sno = $_POST['sno'];
$t_name = $_POST['name'];
$t_des = $_POST['description'];

if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
  $file = $_FILES['image']['name'];
  $dst = "./image/".$file;
  $dst_db = "image/".$file;
  move_uploaded_file($_FILES['image']['tmp_name'], $dst);

  $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des', image='$dst_db' WHERE sno = '$sno' ";
} else {
  $sql2 = "UPDATE teacher SET name='$t_name', description='$t_des' WHERE sno = '$sno'";
}

$result2 = mysqli_query($conn, $sql2);

if($result2) {
  header("location:view_teacher.php");
} else {
  echo "Update failed: " . mysqli_error($conn);
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
            width: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 600px;
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
        <H1>update Teacher data</H1>

        <div class="div_deg">

        <form class="form_deg" action="#" method="POST" enctype="multipart/form-data">
            <div>
                <label>Sno</label>
                <input type="text" name="sno" value="<?php echo "{$info['sno']}"  ?>">
            </div>
            <div>
                <label>Teacher Name</label>
                <input type="text" name="name" value="<?php echo "{$info['name']}"  ?>">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description" rows="4" <?php echo "{$info['description']}"  ?>></textarea>
            </div>
            <div>
                <label>Teacher Old Image</label>
                <img height="100px" width="100px" src="<?php echo "{$info['image']}"  ?>">
            </div>
            <div>
                <label>Teacher new Image</label>
                <input type="file" name="image">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" name="update_teacher" value="Update">
            </div>
        </form>

        </div></center>
    </div>

</body>
</html>
</body>
</html>