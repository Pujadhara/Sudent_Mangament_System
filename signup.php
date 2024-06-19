<style>
*{
  margin: 0;
  padding: 0;
}

.container{
    max-width: 800px;
    margin: 20px auto;
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
    .submit{
      width:20%;
      height: 40px;
      text-align: center;
      background-color: lightcoral;
      border-radius: 5px;
    }
    .mess{
      margin-top: 4px;
      margin-bottom : 35px;
      font-size: medium;
      padding-left: 400px;
    }
    .usertype{
      width:30%;
      margin-top:10px;
        height:30px;
        border: 1px solid black;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
<!doctype html>
<html lang="en" >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous"> -->

    <title>signup</title>
  </head>
  <body>
  <?php require 'partials/_nav.php' ?>

  <?php
  if($_SERVER["REQUEST_METHOD"]== "POST"){
    $showAlert = false;
    $showError = false;
     include 'partials/_dbconnect.php';
     $username = $_POST["username"];
     $email = $_POST["email"];
     $usertype = $_POST["usertype"];
     $password = $_POST["password"];
     $cpassword = $_POST["cpassword"];
     $phone = $_POST["phone"];
     //$exists = false;
      $existSql="SELECT * FROM `user` WHERE username = '$username'";
     
     $result = mysqli_query($conn, $existSql);
     $numExistRows = mysqli_num_rows($result);

     if($numExistRows > 0){
      //$exists = true;
      $showError = " Username already exists . ";
     }
     else{
      //$exists = false;

     if(($password == $cpassword)){
        $sql = "INSERT INTO `user` (`username`, `password`, `dt`,`usertype`,`email`,`phone`) VALUES ('$username', '$password',current_timestamp(),'$usertype','$email','$phone')";
        $result = mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
         }
     }
     else{
      $showError = "passwords do not match . ";
     }
    }
     if($showAlert){
      echo'
     <div class="alert alert-success        alert-dismissible fade show" role="alert">
         <strong>Success!</strong> Your account is now created and you can login .
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
      echo'
     <div class="alert alert-danger        alert-dismissible fade show" role="alert">
         <strong>ERROR!</strong> '.$showError.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

   
   }
  ?>

    <div class="container">
      <center>

        <h1 class="text-center">SignUp to our website</h1>
        <br><br>

  <form class="col g-3" action="/project/signup.php" method="post">
  <div>
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div>
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div>
    <label for="phone" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div>
    <label for="usertype">Usertype</label>
    <select id="usertype" name="usertype" class="usertype">
      <option selected>Choose Usertype</option>
      <option value="student">Student</option>
      <option value="admin">Admin</option>
    </select>
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div>
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <br>
    <div id="" class="mess">Make sure to type the same password </div>
  </div>
  <div>
    <button class="submit" type="submit">Signup</button>
  </div>

  <div>
    <h4>Already have an account ? <a href="login.php" style="color:red; text-decoration:none; ">Login Now</a></h4>
  </div>
</form>
  </center>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</body>
</html>