<?php

require_once("connection.php");

$id=$_POST["id"];

$query="DELETE FROM `students` WHERE `id`='$id' ";
$res=mysqli_query($conn,$query);
if($res){
    echo 1;
}
else{
    echo 0;
}

?>
