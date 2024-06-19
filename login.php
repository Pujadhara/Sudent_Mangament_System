<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="log.css">
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

    <title>Login</title>
  </head>
  <body>

  <?php
  
  require ('partials/_nav.php');
 
  if($_SERVER["REQUEST_METHOD"]== "POST"){
    $login = false;
    $showError = false;
     include 'partials/_dbconnect.php';
     $username = $_POST["username"];
     $password = $_POST["password"];
     
     $sql = "SELECT * FROM `user` WHERE username='$username' AND password ='$password'";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     $row = mysqli_fetch_array($result);
     if($num == 1){
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      if($row['usertype'] =="admin")
      {  
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = "user";
        header("location: adminhome.php");
      }
      else if($row['usertype'] =="student")
      {
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = "student";
        header("location: studenthome.php?student_id=$username");
      }
     }
        else{
      $showError = "Invalid Credentials ";
     }
     if($login){
      echo'
     <div>
         <strong>Success!</strong> You are logged in . 
        </div>';
    }
    if($showError){
      echo'
     <div>
         <strong>ERROR!</strong> '.$showError.'
        </div>';
    }
  }
  ?>

  <div class="container">
    <center>
  <h1>Login to your account</h1>
 <form action="/project/login.php" method="post">
  <div class="name">
    <label for="username" >Username :</label>
    <input type="text" maxlength ="11" class="form" id="username" name="username">
  </div>
  <div class="name">
    <label for="password" >Password :</label>
    <input type="password" maxlength="23" class="form" id="password" name="password">
  </div>


  <div class="submit">
  <button class="submit" type="submit">login</button>
  </center>
  
  <div>
    <h4 style="padding-left: 150px;">Don't have an account ? <a href="signup.php" style="color:red; text-decoration:none; ">SignUp Now</a></h4>
  </div>
  </div>

</form>

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