<?php

echo 
'<style>


.con1{
display:flex;  background-color:black; height:70px; text-align:center; padding-left:35px;
}

.nav-item{
padding:15px;
}

.item{
padding:8px;
font-size:20px;
margin-left:1000px;
}

a{
color:white;
}
</style>
<nav>
  <div class="con1">
    <a href="/project" style="text-decoration:none; padding:10px;"><h2>RVSCET</h2></a>
    <div class="item" style="display:flex;">
        <div class="nav-item">
          <a href="/project" style="text-decoration:none;">Home</a>
        </div>
        <div class="nav-item">
          <a href="/project/login.php" style="text-decoration:none;">Login</a>
        </div>
        <div class="nav-item">
          <a href="/project/signup.php" style="text-decoration:none;">signup</a>
        </div>
        <div class="nav-item">
          <a href="/project/logout.php" style="text-decoration:none;">logout</a>
        </div>
    </div>
  </div>
</nav>';
?>

