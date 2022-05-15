<?php

require_once("..//connection.php");

    $query="SELECT * FROM `students` ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    $row=mysqli_fetch_array($res);
    

    $encode_data=json_encode($row,JSON_PRETTY_PRINT);
        $file_name="my-".date("d-m-y").".json";
        if(file_put_contents("json-data-file/$file_name",$encode_data)){
            echo $file_name."File created and data saved";
        }
        else{
            echo "Data cannot saved";
        }

}

    

?>

