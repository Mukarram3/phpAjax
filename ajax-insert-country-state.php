<?php

require_once("connection.php");

$cid=$_POST["cid"];
$sid=$_POST["sid"];


$query="SELECT * FROM `country_tb` WHERE `cid` = '$cid' ";
$query1="SELECT * FROM `state_tb` WHERE `sid` = '$sid' ";
$res=mysqli_query($conn,$query);
$res1=mysqli_query($conn,$query1);
if(mysqli_num_rows($res)>0){

    $row=mysqli_fetch_array($res);
    $row1=mysqli_fetch_array($res1);

    $country=$row["cname"];
    $state=$row1["sname"];

    $query2="INSERT INTO `country_state` (`country`,`state`) VALUES ('$country','$state') ";

$res=mysqli_query($conn,$query2);

if($res){
    echo 1;
}
else{
    echo 0;
}

}

?>
