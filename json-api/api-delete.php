<?php

require_once("..//connection.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-width');

$data=json_decode(file_get_contents("php://input"),true);
$id=$data["sid"];


    $query="DELETE FROM `students_serialize` WHERE `id`='$id' ";
$res=mysqli_query($conn,$query);
if($res){
    
    echo json_encode(["Message"=>"Record deleted","status"=>"true"]);

}
else{
    echo json_encode(["Message"=>"No Record deleted","status"=>"false"]);
}

    

?>

