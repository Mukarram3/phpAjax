<?php

require_once("..//connection.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data["sid"];

    $query="SELECT * FROM `students_serialize` WHERE `id`='$student_id' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_all($res, MYSQLI_ASSOC)){ 

    $encode_data=json_encode($row,JSON_PRETTY_PRINT);

    }
       
        echo $encode_data;

}
else{
    echo json_encode(["message"=>"No record found","Status"=>"false"]);
}

    

?>

