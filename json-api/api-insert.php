<?php

require_once("..//connection.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-width');

$data=json_decode(file_get_contents("php://input"),true);
$name=$data["sname"];
$age=$data["sage"];
$country=$data["scity"];

    $query="INSERT INTO `students_serialize` (`name`,`age`,`country`) Values('$name','$age','$country') ";
$res=mysqli_query($conn,$query);
if($res){
    
    echo json_encode(["Message"=>"Record Inserted","status"=>"true"]);

}
else{
    echo json_encode(["Message"=>"No Record Inserted","status"=>"false"]);
}

    

?>

