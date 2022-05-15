<?php

require_once("connection.php");

if($_FILES["file"]["name"]!=""){

    $count=count($_FILES["file"]["name"]);

    if($count<=3){

            for($i=0;$i<$count;$i++){

                $img=$_FILES["file"]["name"][$i];
                $tmp_img=$_FILES["file"]["tmp_name"];


                $extension=pathinfo($img,PATHINFO_EXTENSION);
                $valid_exten=array("jpg","png","jpeg");

                if(in_array($extension,$valid_exten)){

                move_uploaded_file($tmp_img[$i],"images/".$img);

                $random_name=rand().".".$extension;
                $img.=$random_name.",";

                }
                else{
                    echo "please select valid extension";
                }

        }
        

    }
    else{

        echo "please select maximum 3 images";

    }

  $query="INSERT INTO `image-upload` (`image`) VALUES ('$img') ";

  $res=mysqli_query($conn,$query);

  if($res){
      echo "Images Uploaded Successfully.";
  }
  else{
      echo "Images Can't Uploaded.";
  }

}


?>
