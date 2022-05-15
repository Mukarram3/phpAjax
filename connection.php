<?php

$server="localhost";
$username="root";
$password="";
$database="ajax-new";
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo "not connected";
}


?>