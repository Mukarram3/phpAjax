<?php

require_once("connection.php");

$name=$_POST["fullname"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$country=$_POST["country"];

$query="INSERT INTO `students_serialize` (`name`,`age`,`gender`,`country`) VALUES ('$name','$age','$gender','$country') ";

$res=mysqli_query($conn,$query);

if($res){
    echo "Hello {$name} Your record is saved";
}
else{
    echo "No record  saved";
}


?>
