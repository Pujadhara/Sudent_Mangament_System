<?php 
        include 'partials/_dbconnect.php';
        $sql = "SELECT * FROM teacher";
        $result = mysqli_query($conn,$sql);
        
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
       
        .buttonForApply{
            margin:25px;
            padding:12px;
            border-radius:10px;
            background-color: lightgreen;
            text-decoration: none;
            border:1px solid black;

        }
        center{
            margin-top:45px;
            margin-bottom:25px;
        }

        center a:hover{ 
            border: 2px solid red;
        }
        .backgroundFooter{
            height:105px;
            width:90%;
            background-color: darkblue;
            margin-left:5%;
        }
        .rowForDesgin{
            display: inline-flex;

        }
        .welcome_img{
            width:98%;
        }
    </style>
</head>
<body>
<nav>
    <label class="logo">RVSCET</label>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/project">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/project/login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/project/signup.php">Signup</a>
        </li>
    </ul>
</nav>

<div class="section1">
    <label class="img_text" style="color:black; padding-top:40px; word-space:5px;">WELCOME TO RVSCET!</label>
    <img class="main_img" src="https://images.shiksha.com/mediadata/images/1490582911phpfvY1Gs.jpeg">
</div>

<div class="container">
    <div class="rowForDesgin">
        <div class="col-md-4">
            <img class="welcome_img" src="pictures/school1.jpg">
        </div>
        <div class="col-md-8">
            <h1>Welcome to RVSCET</h1>
            <p>RVS College of Engineering and Technology, located in Jamshedpur, Jharkhand, was established in 2004 with the primary goal of providing high-quality education in technology to contribute to society. Our 30-acre campus offers a serene and stimulating environment for our students to thrive. We are recognized by AICTE and JUT, ensuring that we adhere to the highest standards of education. Our experienced faculty is committed to offering a comprehensive curriculum focused on hands-on training to develop practical understanding. Our infrastructure includes state-of-the-art laboratories, helping us achieve excellence in technical education. We encourage our students to participate in extracurricular activities, preparing them for success in their professional and personal lives. At RVS College of Engineering and Technology, we are dedicated to providing an exceptional educational experience and equipping our students with the challenges of the future.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex itaque quia quasi, sapiente, in inventore fuga, ducimus vitae omnis aliquam eum ratione odio. Tempora quis temporibus deserunt vero! Consequuntur doloribus magnam exercitationem placeat, optio fugiat eaque dolore non alias.
            </p>
        </div>
    </div>
</div>

<center class="ourTeachers">
    <p>Our Teachers</p>
</center>

<div class="container2">
    <div class="row2">
        <?php 
                    while($info= $result->fetch_assoc())
                    {?>
        <div class="teacher">
            <img  style="width:300px; height:200px;"    src="<?php  echo"{$info['image']}" ?>" alt="images of teacher">
            <br>
            <h3><?php  echo"{$info['name']}" ?></h3>
            <br>
            <h5><?php  echo"{$info['description']}" ?></h5>
        </div>
        <?php } ?>
       
    </div>
</div>

<center class="ourTeachers">
    <p>Our Courses</p>
</center>

<div class="container2">
    <div class="row2">
        <div class="teacher">
            <img  src="pictures/bba.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consequuntur ratione eligendi quas, earum nobis?</p>
        </div>
        <div class="teacher">
            <img src="pictures/diploma.jpg" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad sapiente, nesciunt quibusdam reprehenderit illo atque!</p>
        </div>
        <div class="teacher">
            <img src="pictures/bca.jpg" class="mcaImage" alt="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos laborum odit pariatur sequi aspernatur mollitia.</p>
        </div>
    </div>

    <div class="row3">
        <div class="teacher">
            <img src="pictures/mtech.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos laborum odit pariatur sequi aspernatur mollitia.</p>
        </div>
        <div class="teacher">
            <img src="pictures/bca.jpg" class="mcaImage" alt="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos laborum odit pariatur sequi aspernatur mollitia.</p>
        </div>
        <div class="teacher">
            <img src="pictures/diploma.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos laborum odit pariatur sequi aspernatur mollitia.</p>
        </div>
    </div>
</div>

<center> <a href="/project/formForStudent.php" class="buttonForApply">Click For Apply </a> </center>

<div class ='backgroundFooter' style="height:895px; background-color: rgba(25,47,89,255);">
        <div class="log">
            <div class="img"><img src="pictures/rvscet_logo.png" alt="rvslogo" style=" width: 100px;
            height: 90px;"></div>
            <div style="padding-top: 30px;"><h1 style="color:white; margin-left:50px;">RVS COLLEGE </h1>
        <u style="color:aliceblue"><h3 style="color:white; margin-left:50px; font-size:16px">OF ENGINEERING AND TECHNOLOGY</h3></u>
        <h4 style="font-size:xx-small; margin-left:50px; color:white;">WHERE KNOWLEDGE IS A PASSION LEARNING AND ADVENTURE</h4>
</div>
</div>


<div class="foot">
    <div class="conpara">
    <h2 style="padding-bottom:18px;">Contact Details</h2>
        <p>College  :  988786476</p>
        <p>Placement  : 946257698</p>
        <p>Principal  : 07033000777</p>
        <p>E-mail  : info@rvscet.com</p>
        <p>E-mail  : rvscet@gmail.com</p>
        <p>Address : Edalbera, P.O.:Bhilai Pahari,<br> NH-33, Jamshedpur,<br> Jharkhand,(INDIA)</p>
    </div>

    <div class="conpara1">
    <h2 style="padding-bottom:18px;">City Address</h2>
    <p>College : 245127</p>
    <p>Phone : 0678 - 73678698</p>
    <p>Fax : 9679 - 389798</p>
    <p>Address : R.V.S.C.E.T,<br> Binda Apartment, Mills Area, <br>Behind Basant Cinema,<br> sakchi,<br> Jamshedpur-831001</p>
    </div>

    <div class="conpara2">
        <h2 style="padding-bottom:18px;">Explore</h2>
        <p>Approval Letters</p>
        <p>AICTE Recommended Books</p>
        <p>for Eng Programmers</p>
        <p>ARIIA 2022 Report</p>
        <p>Financial Statements</p>
        <p>Higher Education Policy</p>
        <P>HR Policy</P>
        <P>IQAC</P>
        <p>RVS Virtual Tour</p>
        <p>Mandatory Disclosure</p>
        <p>Non - Statutory committees</p>
        <p>Undertaking</p>
    </div>
</div>
<div class="foot1">
    <div class="conpara3">
        <h2 style="padding-bottom:18px;">Quick Links</h2>
        <p>AICTE-Feedback</p>
        <p>Apply for WES/Transcript & <br>Student verification</p>
        <p>Anti-Ragging</p>
        <p>Grievance Redressal Portal</p>
        <p>Internal Complaints and <br> Women Empowerment</p>
        <p>Committee</p>
        <p>Smartapp</p>
        <p>Downloads</p>
    </div>
    <div class="conpara4">
        <h2 style="padding-bottom:18px;">Academics</h2>
        <p>Academic Regulations</p>
        <p>Academic Calender</p>
        <p>Annual Report</p>
        <p>COE Corner</p>
        <p>Learning Augmented</p>
        <p>ERP</p>
    </div>
    <div class="conapar5">
    <h2 style="padding-bottom:18px;">Follow Us On</h2>
    <div>
    <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    </div>
</div>
</div>

<div class="Footer" >
    <div style="padding: 15px; color:white;"><p>RVS College - &copy 2023 All Rights Reserved</p></div>
    <div style="padding: 15px; color:white;">About</div>
    <div style="padding: 15px; color:white;">Privacy Policy</div>
    <div style="padding: 15px; color:white;">Terms Of Use</div>
    <div style="padding: 15px; color:white;">Refund Policy</div>
</div>

</body>
</html>