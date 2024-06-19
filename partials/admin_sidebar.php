<style>
*{
    padding: 0px;
    margin: 0px;
}

.header{
    background-color: black;
    line-height: 70px;
    padding-left: 30px;
    position:fixed;
    top:0%;
    width:100%;
    
}
a,a:hover{
    text-decoration: none!important;
}

.logout{
    float: right;
    padding-right: 30px;
}

ul{
    background-color: rgb(135, 60, 116);
    width: 15%;
    height: 100%;
    position: fixed;
    top:9.5%;
    padding-top: 5%;
    text-align: center;
}

ul li{
    list-style: none;
    padding-bottom: 30px;
    font-size: 18px;
}

ul li a{
    color: white;
    font-weight: bold;
}

ul li a:hover
{
   color: rgb(200, 189, 211);
   text-decoration: none;
}

.content{
    margin-left: 15%;
    margin-top: 5%;
}

.table{
    margin-left: 0;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding:25px;
  }

  td{
    background-color:rgb(197, 189, 207);
}

.btn{
            background-color: lightcoral;
            border-radius: 5px;
            padding: 5px;
            margin-top: 20px;
            margin-right: 100px;
            width: 150px;
            height: 40px;
            color: white;
            font-size: large;
}
</style>

<header class="header">
        <a href="" style="color: white; font-size:25px;">Admin Dashboard</a>
         
        <div class="logout">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="add_student.php">Add student</a></li>
            <li><a href="view_student.php">View Student</a></li>
            <li><a href="update_student.php">Update student</a></li>
            <li><a href="add_teacher.php">Add Teacher</a></li>
            <li><a href="view_teacher.php">view Teacher</a></li>
            <li><a href="update_teacher.php">Update Teacher</a></li>
            <li><a href="add_course.php">Add courses</a></li>
            <li><a href="view_course.php">view courses</a></li>
            <li><a href="update_course.php">Update Courses</a></li>

        </ul>
    </aside>