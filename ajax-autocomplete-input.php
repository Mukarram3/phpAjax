<?php

require_once("connection.php");

$country=$_POST["country"];

$query="SELECT DISTINCT(country) FROM `students_serialize` WHERE `country` LIKE '%$country%' ";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)){
?>

<li><?php echo $row["country"]; ?></li>

<?php
    }

}
else{
    echo "NO record found";
}

?>
