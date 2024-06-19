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

$sql="SELECT * FROM `studentdetail`";

$result = mysqli_query($conn,$sql);


?>

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
    <H1>Applied for admission</H1>
    <br><br>
    <table  border="1px"  >
        <tr>
            <th style="padding: 20px; font-size:15px;">First Name</th>
            <th style="padding: 20px; font-size:15px;">Last Name</th>
            <th style="padding: 20px; font-size:15px;">Student Number</th>
            <th style="padding: 20px; font-size:15px;">Year</th>
            <th style="padding: 20px; font-size:15px;">Degree Program</th>
            <th style="padding: 20px; font-size:15px;">Email</th>
            <th style="padding: 20px; font-size:15px;">Network Provider</th>
            <th style="padding: 20px; font-size:15px;">Phone</th>
            <th style="padding: 20px; font-size:15px;">Birth Month</th>
            <th style="padding: 20px; font-size:15px;">Birth Day</th>
            <th style="padding: 20px; font-size:15px;">Birth Year</th>
            <th style="padding: 20px; font-size:15px;" >streetAddress</th>
            <th style="padding: 20px; font-size:15px;">streetAddress1</th>
            <th style="padding: 20px; font-size:15px;">City Address</th>
            <th style="padding: 20px; font-size:15px;">Postal</th>
            <th style="padding: 20px; font-size:15px;">state</th>
            <th style="padding: 20px; font-size:15px;">Country</th>
        </tr>
       <?php

       while($info=$result->fetch_assoc()){
        ?>

        <tr>
            <td style="padding: 20px;"><?php echo"{$info['FirstName']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['LastName']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['studentNumber']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['Year']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['DegreeProgram']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['Email']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['Networkprovider']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['Phone']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['selectMonth']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['SelectDay']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['Selectyear']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['streetaddresss']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['streetaddresssecond']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['cityaddress']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['postal']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['state']}" ?></td>
            <td style="padding: 20px;"><?php echo"{$info['country']}" ?></td>
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