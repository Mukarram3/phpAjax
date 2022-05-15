<?php

require_once("connection.php");

$query="SELECT distinct(country) FROM `students_serialize` ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>

 <option value="<?php echo $row["country"]; ?>"> <?php echo $row["country"]; ?> </option>

<?php
   

    echo $row;
    }
}
else{
    echo "no data available";
}

?>
