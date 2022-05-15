<?php

require_once("connection.php");

$fname=$_POST["name"];
$lang=$_POST["lang"];

$query="INSERT INTO `students_lang` (`name`,`languages`) VALUES ('$fname','$lang') ";

$res=mysqli_query($conn,$query);

if($res){
    echo "successfuly saved";
}
else{
    echo "can't saved data";
}


?>
