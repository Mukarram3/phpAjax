<?php

require_once("connection.php");

$fname=$_POST["fname"];
$lname=$_POST["lname"];

$query="INSERT INTO `students` (`first_name`,`last_name`) VALUES ('$fname','$lname') ";

$res=mysqli_query($conn,$query);

if($res){
    echo 1;
}
else{
    echo 0;
}


?>
