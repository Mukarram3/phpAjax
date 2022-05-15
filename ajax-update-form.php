<?php

require_once("connection.php");

$id=$_POST["id"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];

$query="UPDATE `students` SET `first_name`='$fname', `last_name`='$lname' WHERE `id`='$id' ";
$res=mysqli_query($conn,$query);
if($res){
    echo 1;
}
else{
    echo 0;
}

?>
