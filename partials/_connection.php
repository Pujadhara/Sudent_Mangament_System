<?php  
//echo "welcome to the stage we are ready to connect my sql database connection to it so lets began's ";
// connnection to the database 
$user="localhost";
$username= "root";
$password="";
$db_name="users";
// for connection the database from the my sql databe we should has to write this or make this connection 

$conn=mysqli_connect($user,$username,$password,$db_name);

// Die if connection was not succesfull 
if(!$conn){
  die("sorry we failed to connect:" . mysqli_connect_error());

}
else{
  // echo" <br>Connection was successful";
}

?>