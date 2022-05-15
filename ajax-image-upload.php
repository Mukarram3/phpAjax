<?php

require_once("connection.php");

if($_FILES["file"]["name"]!=""){

    $image=$_FILES["file"]["name"];
    $tmp_image=$_FILES["file"]["tmp_name"];

    $path="images/".$image;
 
    $extension=pathinfo($image,PATHINFO_EXTENSION);
    $valid_extension=array("jpg","jpeg","png","gif");

    if(in_array($extension,$valid_extension)){

        $move=move_uploaded_file($tmp_image,"images/".$image);

        $query="INSERT INTO `image-upload` (`image`) VALUES ('$image') ";

        $res=mysqli_query($conn,$query);
      
        if($res){
            echo "Images Uploaded Successfully.";
        }
        else{
            echo "Images Can't Uploaded.";
        }


echo ' <img src=" '.$path.' " alt="" srcset=""> <br><br>
<button data-path=" '.$path.' " id="delete-btn">Delete</button>';
     
}
else{
    echo "please select valid format";
}

}

else{
    echo ' <script>alert("please select file");</script> ';
}




?>

