<?php

require_once("connection.php");

$id=$_POST["id"];

$id=implode($id, ",");

$query="DELETE FROM `students_serialize` WHERE `id` IN ($id) ";
$res=mysqli_query($conn,$query);
if($res){
    echo 1;
}
else{
    echo 0;
}

?>
