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
    top:9.1%;
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
        <a href="" style="color: white; font-size:25px;">Student Dashboard</a>
         
        <div class="logout">
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li><a href="update_profile.php">My profile</a></li>
            <li><a href="">View Course</a></li>
            <li><a href="result.php">View Result</a></li>

        </ul>
    </aside>